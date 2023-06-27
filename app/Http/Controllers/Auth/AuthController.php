<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $dataUser = [
            'login'         => $request->login,
            'password'      => Hash::make($request->password),
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
        ];

        User::firstOrCreate($dataUser);

        return redirect()->route('auth.login')->with('success', 'Регистрация прошла успешно');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'login' => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.create')->with('success', 'Авторизовались успешно');
        }

        return back()->with('error', 'Логин или Пароль не верны');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
