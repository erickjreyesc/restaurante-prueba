<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomHeader
{
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
        'ServerSignature'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Referrer-Policy', 'no-referrer');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', "none");
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Cache-Control', 'max-age=60, must-revalidate');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        $response->headers->set('Expect-CT', 'enforce, max-age=30');
        $response->headers->set('X-Robots-Tag', 'index,follow');
        $response->headers->set('Content-Security-Policy', "default-src 'self' *.google-analytics.com; script-src 'self' 'unsafe-inline' 'unsafe-eval' unpkg.com *.googletagmanager.com *.google-analytics.com *.cloudflare.com *.google.com *.gstatic.com *.jsdelivr.net; img-src 'self' 'unsafe-eval' ui-avatars.com data:; style-src 'self' npmcdn.com *.jsdelivr.net https://fonts.googleapis.com fonts.gstatic.com 'unsafe-inline' 'unsafe-eval' *.cloudflare.com unpkg.com; font-src 'self' *.googleapis.com fonts.gstatic.com fontawesome.com https://fonts.googleapis.com fonts.gstatic.com 'unsafe-eval';  frame-src 'self' *.google.com play.google.com; object-src 'none'; base-uri 'self'; frame-ancestors 'none'; form-action 'self';");
        $response->headers->set('Permissions-Policy', "geolocation=(),midi=(),sync-xhr=(),microphone=(),camera=(),magnetometer=(),gyroscope=(),fullscreen=(self),payment=()");

        $this->removeUnwantedHeaders($this->unwantedHeaderList);

        return $response;
    }

    /**
     * @param $headerList
     */
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }
}
