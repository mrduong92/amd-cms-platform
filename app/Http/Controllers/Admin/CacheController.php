<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    /**
     * Clear homepage cache
     */
    public function clearHomepage()
    {
        HomeController::clearCache();

        return redirect()->back()->with('success', 'Cache trang chủ đã được xóa thành công.');
    }

    /**
     * Clear all application cache
     */
    public function clearAll()
    {
        Cache::flush();

        return redirect()->back()->with('success', 'Tất cả cache đã được xóa thành công.');
    }
}
