<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetectSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();

        // Allow site override via query parameter in local development
        if (app()->environment('local') && $request->has('site')) {
            $site = Site::where('slug', $request->get('site'))->first();
        } else {
            // Match domain exactly or as subdomain
            $site = Site::where('domain', $host)
                        ->orWhere('domain', 'like', '%' . $host . '%')
                        ->where('is_active', true)
                        ->first();
        }

        // Fallback to configured default site
        if (!$site) {
            $defaultSlug = config('app.default_site', 'nmtauto');
            $site = Site::where('slug', $defaultSlug)->first();
        }

        // Bind current site to the container
        app()->instance('currentSite', $site);

        // Share with all views
        view()->share('currentSite', $site);

        return $next($request);
    }
}
