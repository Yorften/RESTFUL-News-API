<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['message' => 'User registered successfully']);
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                $user->tokens()->delete();
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json([
                    'message' => 'Connected Successfully',
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'message' => 'Invalid Credentials', "val" => $request->all()
                ], 401);
            }
        } else {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout successfully'
        ]);
    }
}
