<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('frontend.user.dashboard');
    }

    public function profile()
    {
        return view('frontend.user.profile');
    }
}
