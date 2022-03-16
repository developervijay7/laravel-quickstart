<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Events\Auth\UserLoggedIn;
use App\Models\User;
use App\Rules\Captcha;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::loginView(function () {
            return view('auth.login');
        });
        Fortify::registerView(function () {
            return view('auth.register');
        });
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });
        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });
        Fortify::ConfirmPasswordView(function ($request) {
            return view('auth.confirm-password', ['request' => $request]);
        });

        Fortify::authenticateUsing(function (Request $request) {
            $validator = Validator::make($request->toArray(), [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required'],
                'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
            ], [
                'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
            ])->validate();

            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                event(new UserLoggedIn($user));
                return $user;
            }
        });

        Fortify::twoFactorChallengeView(function (Request $request) {
            return view('auth.two-factor-challenge', ['request' => $request]);
        });


        RateLimiter::for('login', function (Request $request) {
            $email = (string)$request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
