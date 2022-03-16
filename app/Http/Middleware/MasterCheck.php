<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MasterCheck
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
        if ($request->user() && $request->user()->id === 1) {
            return $next($request);
        }

        return redirect()->back()->withSweetError(__('Sorry! You dont have access to perform this operation. Only Master can do this.'));
    }
}
