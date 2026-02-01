<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Get the current theme
     */
    protected function getTheme(): string
    {
        $site = currentSite();
        return $site?->theme ?? 'frontend';
    }

    public function show($slug)
    {
        $page = Page::forCurrentSite()->where('slug', $slug)->active()->firstOrFail();

        $theme = $this->getTheme();

        // Check if a specific view exists for this page template in the theme
        $viewPath = $theme . '.pages.' . ($page->template ?? 'show');
        if (!view()->exists($viewPath)) {
            $viewPath = $theme . '.pages.show';
        }

        // Fall back to frontend theme if view doesn't exist in current theme
        if (!view()->exists($viewPath)) {
            $viewPath = 'frontend.pages.show';
        }

        return view($viewPath, compact('page'));
    }
}
