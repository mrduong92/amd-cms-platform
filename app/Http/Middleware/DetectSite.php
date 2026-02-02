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
     * Detects which frontend theme to use based on domain or environment config.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $site = null;

        // Allow site override via query parameter in local development
        if (app()->environment('local') && $request->has('site')) {
            $site = Site::where('slug', $request->get('site'))->active()->first();
        }

        // Try to match domain exactly
        if (!$site) {
            $site = Site::where('domain', $host)->active()->first();
        }

        // Try to match domain as contains (for subdomains like www.domain.com)
        if (!$site) {
            $site = Site::where('domain', 'like', '%' . $host . '%')
                        ->active()
                        ->first();
        }

        // Try reverse match (host contains domain, e.g., host is "www.amdai.vn" and domain is "amdai.vn")
        if (!$site) {
            $site = Site::active()->get()->first(function ($s) use ($host) {
                return !empty($s->domain) && str_contains($host, $s->domain);
            });
        }

        // Fallback to configured default site (via DEFAULT_SITE env variable)
        if (!$site) {
            $defaultSlug = config('app.default_site', 'nmtauto');
            $site = Site::where('slug', $defaultSlug)->active()->first();

            // Ultimate fallback to first active site
            if (!$site) {
                $site = Site::active()->first();
            }
        }

        // Bind current site to the container (for theme detection)
        app()->instance('currentSite', $site);

        // Share with all views
        view()->share('currentSite', $site);

        return $next($request);
    }
}
