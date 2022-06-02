<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserTypeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if ($request->user()) {
            if (strpos($type, '|') !== false) {
                $types = explode('|', $type);

                foreach ($types as $t) {
                    if ($request->user()->isType($t)) {
                        return $next($request);
                    }
                }
            } elseif ($request->user()->isType($type)) {
                return $next($request);
            }
        }

        return redirect()->back()->withSweetError(__('You do not have access to perform this action.'));
    }
}
