<?php

use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SocialPostController;
use App\Http\Controllers\Admin\ContactInquiryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::resource('categories', CategoryController::class);
    Route::post('categories/reorder', [CategoryController::class, 'reorder'])->name('categories.reorder');

    // Products
    Route::get('products/import', [ProductController::class, 'importForm'])->name('products.import');
    Route::post('products/import', [ProductController::class, 'importExcel'])->name('products.import.execute');
    Route::get('products/import-template', [ProductController::class, 'downloadTemplate'])->name('products.import.template');
    Route::resource('products', ProductController::class);
    Route::post('products/reorder', [ProductController::class, 'reorder'])->name('products.reorder');
    Route::post('products/reorder-featured', [ProductController::class, 'reorderFeatured'])->name('products.reorder-featured');
    Route::delete('products/{product}/specs/{spec}', [ProductController::class, 'deleteSpec'])->name('products.specs.delete');
    Route::delete('products/{product}/images/{image}', [ProductController::class, 'deleteImage'])->name('products.images.delete');

    // Tags
    Route::resource('tags', TagController::class);

    // Services
    Route::resource('services', ServiceController::class);
    Route::post('services/reorder', [ServiceController::class, 'reorder'])->name('services.reorder');

    // Posts
    Route::resource('posts', PostController::class);

    // Pages
    Route::resource('pages', PageController::class);

    // Sliders
    Route::resource('sliders', SliderController::class);
    Route::post('sliders/reorder', [SliderController::class, 'reorder'])->name('sliders.reorder');

    // Menus
    Route::resource('menus', MenuController::class);
    Route::post('menus/reorder', [MenuController::class, 'reorder'])->name('menus.reorder');

    // Partners
    Route::resource('partners', PartnerController::class);
    Route::post('partners/reorder', [PartnerController::class, 'reorder'])->name('partners.reorder');

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    // Media Manager
    Route::resource('media', MediaController::class)->only(['index', 'store', 'destroy']);
    Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');

    // Contact Inquiries
    Route::resource('inquiries', ContactInquiryController::class)->only(['index', 'show', 'destroy']);
    Route::patch('inquiries/{inquiry}/status', [ContactInquiryController::class, 'updateStatus'])->name('inquiries.status');

    // Users
    Route::resource('users', UserController::class);

    // Social Posts
    Route::resource('social-posts', SocialPostController::class);
    Route::post('social-posts/reorder', [SocialPostController::class, 'reorder'])->name('social-posts.reorder');

    // Cache Management
    Route::post('cache/clear-homepage', [CacheController::class, 'clearHomepage'])->name('cache.clear-homepage');
    Route::post('cache/clear-all', [CacheController::class, 'clearAll'])->name('cache.clear-all');
});
