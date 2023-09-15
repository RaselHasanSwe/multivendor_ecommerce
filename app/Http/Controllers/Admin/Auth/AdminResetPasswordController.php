<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class AdminResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function guard()
    {
    return Auth::guard('admin');
    }

    protected function broker()
    {
    return Password::broker('admins');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('Frontend.sellers.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

}
