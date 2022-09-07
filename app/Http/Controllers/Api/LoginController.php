<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {   
        $this->validateLogin($request);

        //login true

        $autenticado = Auth::attempt($request->only('email','password'));

        if($autenticado){
            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' =>'Success'
            ]);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    public function validateLogin(Request $request)
    {   
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
        ]);
    }
}
