<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\Login;
use App\Http\Requests\Api\V1\Auth\Register;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Register a new user
    public function register(Register $request)
    {
        $user = User::create([  
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $credentials = $request->only('email', 'password');

        return response()->json([
            'message' => 'User registered successfully',
            'token' => JWTAuth::attempt($credentials),
            'user' => new UserResource($user) 
        ], 201);
    }

    // Log user in
    public function login(Login $request)
    { 
        $credentials = $request->only('email', 'password');

        try {
            // If credentials are not valid
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Invalid credentials',
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'message' => 'Login error',
            ], 500);
        }

        // Return user and generated token
        return response()->json([ 
            'token' => $token,
            'user' => new UserResource(Auth::user())
        ]);
    }

    public function logout(Request $request)
    {
        // Token validation
        $token = $request->header('Authorization'); 
        if (!$token) return response()->json(['status' => 'Authorization Token not found'], 401);
        
        try {
            // Invalidate token
            JWTAuth::invalidate($request->token); 

            return response()->json([
                'success' => true,
                'message' => 'User logged out.'
            ]);
        } catch (JWTException $exception) { 
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], 500); 
        }
    }
}
