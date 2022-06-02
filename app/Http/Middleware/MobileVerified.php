<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MobileVerified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->mobile && $request->user()->mobile_verified_at) {
            return $next($request);
        }

        return redirect()->back()->withSweetInfo(__('Sorry! You need to verify your mobile number to access this. <a href=' . route('frontend.user.profile') . ' class=text-blue-500>Click here</a> to verify your mobile number.'));
    }
}
