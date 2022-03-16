<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Locale is enabled and allowed to be changed
        if (config('quickstart.locale.status') && session()->has('locale')) {
            setAllLocale(session()->get('locale'));
        }
        return $next($request);
    }
}
