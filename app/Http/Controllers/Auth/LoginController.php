<?php

namespace AccountSystem\Http\Controllers\Auth;

use AccountSystem\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // show login form
    public function showLoginForm() {
        return view('login');
    }

    // show logoutform
    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('login');
    }

    protected function guard() {
        return Auth::guard('admin');
    }
}
