<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes with site detection
Route::middleware(['detect.site'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

// Search
Route::get('/tim-kiem', [SearchController::class, 'index'])->name('search');

// Products
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/san-pham/danh-muc/{slug}', [ProductController::class, 'category'])->name('products.category');
Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('products.show');

// Services
Route::get('/dich-vu', [ServiceController::class, 'index'])->name('services.index');
Route::get('/dich-vu/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Posts
Route::get('/tin-tuc', [PostController::class, 'index'])->name('posts.index');
Route::get('/du-an', [PostController::class, 'projects'])->name('posts.projects');
Route::get('/tin-tuc/{slug}', [PostController::class, 'show'])->name('posts.show');

// Contact
Route::get('/lien-he', [ContactController::class, 'index'])->name('contact');
Route::post('/lien-he', [ContactController::class, 'submit'])->name('contact.submit');

// Newsletter
Route::post('/newsletter', [ContactController::class, 'newsletter'])->name('newsletter.subscribe');

// Dashboard redirect
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    // Dynamic Pages (should be last)
    Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show')->where('slug', '^(?!admin|api|login|register|logout|password|profile|storage).*$');
});

require __DIR__.'/auth.php';
