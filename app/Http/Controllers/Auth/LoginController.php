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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:operator')->except('logout');
    }

    public function showAdmin_OperatorLoginForm($user)
    {
        if ($user == 'admin') {
            return view('auth.login', ['url' => 'admin']);
        } elseif ($user == 'operator') {
            return view('auth.login', ['url' => 'operator']);
        } else {
            return redirect()->back();
        }
    }

    public function admin_operatorLogin(Request $request, $user)
    {
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('operator')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // $url = '';
            // if ($user == 'admin') {
            //     $url = '/admin';
            // } else {
            //     $url = '/order';
            // }

            return redirect()->route('approval');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        $guard = '';
        $url = '';
        if (!is_null(Auth::guard('web')->user())) {
            $guard = 'web';
            $url = '';
        } elseif (!is_null(Auth::guard('operator')->user())) {
            $guard = 'operator';
            $url = 'operator';
        } else {
            $guard = 'admin';
            $url = 'admin';
        }
        $this->guard($guard)->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login/'.$url);
    }
}
