<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSpec;
use App\Models\Tag;
use App\Exports\ProductImportTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        $isFeaturedFilter = $request->boolean('is_featured');

        if ($request->filled('is_featured') && $isFeaturedFilter) {
            $query->where('is_featured', true);
            $query->orderBy('featured_order');
        } else {
            $query->orderBy('order');
        }

        $products = $query->paginate(15)->withQueryString();
        $categories = Category::with('products')->orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories', 'isFeaturedFilter'));
    }

    public function create()
    {
        $categories = Category::with('products')->orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('admin.products.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'sku' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'badge' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|string|max:500',
            'specs' => 'nullable|array',
            'specs.*.name' => 'nullable|string|max:100',
            'specs.*.value' => 'nullable|string|max:255',
            'gallery' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = Product::max('order') + 1;

        if ($validated['is_featured']) {
            $validated['featured_order'] = Product::where('is_featured', true)->max('featured_order') + 1;
        }

        // Handle main image from file manager (convert URL to storage path)
        if (!empty($validated['image'])) {
            $validated['image'] = $this->convertUrlToStoragePath($validated['image']);
        }

        $product = Product::create($validated);

        // Handle specs
        if ($request->filled('specs')) {
            foreach ($request->specs as $index => $spec) {
                if (!empty($spec['name']) && !empty($spec['value'])) {
                    ProductSpec::create([
                        'product_id' => $product->id,
                        'spec_name' => $spec['name'],
                        'spec_value' => $spec['value'],
                        'order' => $index,
                    ]);
                }
            }
        }

        // Handle gallery images from file manager (comma-separated URLs)
        if (!empty($request->gallery)) {
            $galleryUrls = array_filter(explode(',', $request->gallery));
            foreach ($galleryUrls as $index => $url) {
                $path = $this->convertUrlToStoragePath(trim($url));
                if ($path) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path,
                        'order' => $index,
                        'is_primary' => $index === 0,
                    ]);
                }
            }
        }

        // Sync tags
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags ?? []);
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được tạo thành công.');
    }

    public function edit(Product $product)
    {
        $product->load(['specs', 'images', 'tags']);
        $categories = Category::with('products')->orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'sku' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'badge' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|string|max:500',
            'specs' => 'nullable|array',
            'specs.*.name' => 'nullable|string|max:100',
            'specs.*.value' => 'nullable|string|max:255',
            'gallery' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        // If product is now featured and wasn't before, assign featured_order
        if ($validated['is_featured'] && !$product->is_featured) {
            $validated['featured_order'] = Product::where('is_featured', true)->max('featured_order') + 1;
        }

        // Handle main image from file manager
        if (!empty($validated['image'])) {
            $newPath = $this->convertUrlToStoragePath($validated['image']);
            // Only update if it's a different image
            if ($newPath !== $product->image) {
                $validated['image'] = $newPath;
            } else {
                unset($validated['image']);
            }
        }

        $product->update($validated);

        // Update specs
        if ($request->filled('specs')) {
            $product->specs()->delete();
            foreach ($request->specs as $index => $spec) {
                if (!empty($spec['name']) && !empty($spec['value'])) {
                    ProductSpec::create([
                        'product_id' => $product->id,
                        'spec_name' => $spec['name'],
                        'spec_value' => $spec['value'],
                        'order' => $index,
                    ]);
                }
            }
        }

        // Handle new gallery images from file manager
        if (!empty($request->gallery)) {
            $galleryUrls = array_filter(explode(',', $request->gallery));
            $lastOrder = $product->images()->max('order') ?? -1;
            foreach ($galleryUrls as $index => $url) {
                $path = $this->convertUrlToStoragePath(trim($url));
                if ($path) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path,
                        'order' => $lastOrder + $index + 1,
                        'is_primary' => false,
                    ]);
                }
            }
        }

        // Sync tags
        $product->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được cập nhật.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được xóa.');
    }

    public function deleteSpec(Product $product, ProductSpec $spec)
    {
        if ($spec->product_id !== $product->id) {
            abort(404);
        }

        $spec->delete();

        return response()->json(['success' => true]);
    }

    public function deleteImage(Product $product, ProductImage $image)
    {
        if ($image->product_id !== $product->id) {
            abort(404);
        }

        $image->delete();

        return response()->json(['success' => true]);
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*' => 'exists:products,id',
        ]);

        foreach ($request->items as $order => $id) {
            Product::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }

    public function reorderFeatured(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*' => 'exists:products,id',
        ]);

        foreach ($request->items as $order => $id) {
            Product::where('id', $id)->update(['featured_order' => $order]);
        }

        return response()->json(['success' => true]);
    }

    public function importForm()
    {
        return view('admin.products.import');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240',
        ]);

        try {
            $import = new ProductImport();
            Excel::import($import, $request->file('file'));

            $count = $import->getRowCount();
            return redirect()->route('admin.products.index')
                ->with('success', "Đã import thành công {$count} sản phẩm.");
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi import: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new ProductImportTemplate(), 'mau-import-san-pham.xlsx');
    }

    /**
     * Convert full URL to storage path
     */
    private function convertUrlToStoragePath(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        // If it's already a storage path (not a full URL), return as is
        if (!str_starts_with($url, 'http')) {
            // Remove leading slash if present
            return ltrim($url, '/');
        }

        // Extract path from URL
        $parsed = parse_url($url);
        $path = $parsed['path'] ?? '';

        // Remove /storage/ prefix if present
        if (str_contains($path, '/storage/')) {
            $path = substr($path, strpos($path, '/storage/') + 9);
        }

        return ltrim($path, '/');
    }
}
