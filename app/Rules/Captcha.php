<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (empty($value)) {
            return false;
        }
        $response = json_decode((new Client([
            'timeout' => config('quickstart.access.captcha.configs.options.timeout'),
        ]))->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => config('quickstart.access.captcha.configs.secret_key'),
                'remoteip' => request()->getClientIp(),
                'response' => $value
            ],
        ])->getBody(), true);
        return isset($response['success']) && $response['success'] === true;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The captcha was invalid. Hi Hi');
    }
}
