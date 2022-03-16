<?php

namespace App\Actions\Fortify;

use App\Events\Auth\UserRegistered;
use App\Models\User;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255', 'min:3'],
            'last_name' => ['string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'mobile' => ['string', 'digits:10', Rule::unique(User::class),],
            'password' => $this->passwordRules(),
            'g-captcha-response' => ['required_if:captcha_status,true', new Captcha],
        ], [
            'g-recaptcha-response.require_if' => __('validation.required', ['attribute' => 'captcha']),
        ])->validate();

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'mobile' => $input['mobile'],
            'password' => Hash::make($input['password']),
            'last_login_at' => now(),
            'last_login_ip' => request()->getClientIp(),
        ]);
        event(new UserRegistered($user));
        return $user;
    }
}
