<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

/**
 * Class LocaleController.
 */
class LocaleController extends Controller
{
    /**
     * @param $locale
     *
     * @return RedirectResponse
     */
    public function change($locale)
    {
        if (array_key_exists($locale, config('quickstart.locale.languages'))) {
            App::setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        } else {
            abort(400);
        }
    }
}
