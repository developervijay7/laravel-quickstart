<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminCheck
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
        if ($request->user() && $request->user()->type == User::TYPE_ADMIN) {
            return $next($request);
        }

        return redirect()->back()->withFlashError(__('Sorry! You dont have access to perform this operation. Only an administrator can perform this operation.'))->withSweetError(__('Sorry! You dont have access to perform this operation. Only an administrator can perform this operation.'));
    }
}
