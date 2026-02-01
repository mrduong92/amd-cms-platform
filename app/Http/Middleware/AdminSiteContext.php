<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSiteContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminSiteId = session('admin_site_id');

        if ($adminSiteId) {
            $site = Site::find($adminSiteId);
        } else {
            // Default to configured default site
            $defaultSlug = config('app.default_site', 'nmtauto');
            $site = Site::where('slug', $defaultSlug)->active()->first();

            // Fallback to first active site if default not found
            if (!$site) {
                $site = Site::active()->first();
            }

            if ($site) {
                session(['admin_site_id' => $site->id]);
            }
        }

        // Bind admin site to the container
        app()->instance('adminSite', $site);

        // Share with all views
        view()->share('adminSite', $site);

        return $next($request);
    }
}
