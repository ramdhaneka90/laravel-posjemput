<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Customer;
use App\Office;
use App\SettingSaldo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:operator');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $saldo_awal = SettingSaldo::first()->limit_saldo;
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phoneNumber'],
            'saldo' => $saldo_awal
        ]);
    }

    public function showAdmin_OperatorRegisterForm($user)
    {
        if ($user == 'admin') {
            return view('auth.register', ['url' => 'admin']);
        } elseif ($user == 'operator') {
            $offices = Office::all();
            return view('auth.register', ['url' => 'operator'], compact('offices'));
        } else {
            return redirect()->back();
        }
    }   

    protected function createAdmin_Operator(Request $request, $usr)
    {
        $this->validator($request->all())->validate();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($usr == 'operator') {
            $user->office_id = $request->office;
            $user->role = 'Operator';
            $user->save();
            Auth::guard('operator')->login($user);
            return redirect('/order');
        } else {
            $user->office_id = null;
            $user->role = 'Admin';
            $user->save();
            return redirect()->intended('login/admin');
        }
    }
}