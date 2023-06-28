<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        try {
            $dataUser = [
                'login'         => $request->login,
                'password'      => Hash::make($request->password),
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
            ];

            $user = User::firstOrCreate($dataUser);

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['login']  = $user->login;

            return response()->json([
                'message' => "User successfully registered.",
                'data'    => $success
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = [
                'login' => $request->login,
                'password' => $request->password,
            ];

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $success['token'] = $user->createToken('MyApp')->plainTextToken;
                $success['login']  = $user->login;

                return response()->json([
                    'message' => "Authorised",
                    'data'    => $success
                ], 200);
            }

            return response()->json([
                'message' => "Unauthorised"
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();

            return response()->json([
                'message' => "User successfully logout."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }
}
