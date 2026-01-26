<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::query();

        if ($request->filled('folder')) {
            $query->where('folder', $request->folder);
        }

        if ($request->filled('type') && $request->type === 'images') {
            $query->images();
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $media = $query->latest()->paginate(24);
        $folders = Media::distinct()->whereNotNull('folder')->pluck('folder');

        return view('admin.media.index', compact('media', 'folders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
            'folder' => 'nullable|string|max:100',
        ]);

        $file = $request->file('file');
        $folder = $request->input('folder', 'uploads');

        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($folder, $fileName, 'public');

        $media = Media::create([
            'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'path' => $path,
            'disk' => 'public',
            'size' => $file->getSize(),
            'folder' => $folder,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'media' => $media,
                'url' => $media->url,
            ]);
        }

        return redirect()->route('admin.media.index')
            ->with('success', 'File đã được tải lên.');
    }

    public function upload(Request $request)
    {
        return $this->store($request);
    }

    public function destroy(Media $media)
    {
        Storage::disk($media->disk)->delete($media->path);
        $media->delete();

        if (request()->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.media.index')
            ->with('success', 'File đã được xóa.');
    }
}
