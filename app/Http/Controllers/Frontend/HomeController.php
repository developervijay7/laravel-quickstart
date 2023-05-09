<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function redirects()
    {
        if (Auth::user()->type == 'admin') {
            return redirect(route('admin.dashboard'));
        } else {
            return redirect(route('frontend.user.dashboard'));
        }
    }
}
