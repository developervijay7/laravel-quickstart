<?php

namespace App\Http\Controllers;

use App\Events\Auth\UserLoggedIn;
use App\Services\Auth\UserService;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @param $provider
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @param  UserService  $userService
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function callback($provider, UserService $userService)
    {
        //checking if making it stateless resolves the issue
        //$user = $userService->registerProvider(Socialite::driver($provider)->user(), $provider);


        $user = $userService->registerProvider(Socialite::driver($provider)->stateless()->user(), $provider);

        if (! $user->isActive()) {
            auth()->logout();

            return redirect()->route('login')->withFlashError(__('Your account has been deactivated.'));
        }

        auth()->login($user);
        event(new UserLoggedIn($user));

        return redirect()->route(homeRoute());
    }
}
