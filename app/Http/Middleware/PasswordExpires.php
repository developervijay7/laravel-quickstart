<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class PasswordExpires
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (is_numeric(config('quickstart.access.user.password_expires_days'))) {
            $password_changed_at = new Carbon($request->user()->password_changed_at ?? $request->user()->created_at);

            if (now()->diffInDays($password_changed_at) >= config('quickstart.access.user.password_expires_days')) {
                return redirect()
                    ->route('frontend.auth.password.expired')
                    ->withSweetWarning(__('Your password has expired. We require you to change your password every :days days for security purposes.', [
                        'days' => config('quickstart.access.user.password_expires_days'),
                    ]));
            }
        }

        return $next($request);
    }
}
