<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
     protected function redirectTo()
     {
       if (Auth::user()->role == 'Murid') {
         return 'murid/dashboard';
       }
       elseif (Auth::user()->role == 'Guru') {
         return 'guru/dashboard';
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
      $this->validateLogin($request);

      if ($this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);
        return $this->sendLockoutResponse($request);
      }

      if ($this->attemptLogin($request)) {
        if (Auth::user()->role == "Guru") {
          return redirect()->route('guru.index')->with('success','Login Success!');;
        }
        if (Auth::user()->role == "Murid") {
          return redirect()->route('murid.index')->with('success','Login Success!');;
        }
        return $this->sendLoginResponse($request);
      }

      $this->incrementLoginAttempts($request);
      return $this->sendFailedLoginResponse($request);
    }
}
