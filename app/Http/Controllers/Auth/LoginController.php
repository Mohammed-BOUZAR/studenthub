<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (auth()->guard('admin')->check()) {
            return '/admin/dashboard';
        } elseif (auth()->guard('teacher')->check()) {
            return '/teacher/dashboard';
        } elseif (auth()->guard('student')->check()) {
            return '/student/dashboard';
        } else {
            return '/';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials_admin = $request->only(['username', 'password']);
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials_admin)) {
            return redirect('/admin');
        } elseif (Auth::guard('teacher')->attempt($credentials)) {
            return redirect('/teacher');
        } elseif (Auth::guard('student')->attempt($credentials)) {
            return redirect('/student');
        }

        return redirect()->back()->withInput($request->only('email') != null ? $request->only('email') : $request->only('username'));
    }
}
