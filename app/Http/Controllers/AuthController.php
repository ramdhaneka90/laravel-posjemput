<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;

class AuthController extends Controller
{
    public function registerAPI(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'api_token' => bcrypt($request->email)
        ]);

        $response = fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->addMeta([
                'token' => $user->api_token
            ])
            ->toArray();

        return response()->json($response, 201);
    }

    public function loginAPI(Request $request, User $user)
    {
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Your credential is wrong'], 401);
        }

        $user = $user->find(Auth::user()->id);
        $user->registeredDeviceId= $request->dev_id;
        $user->save();
        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->addMeta([
                'token' => $user->api_token
            ])
            ->toArray();
    }
}
