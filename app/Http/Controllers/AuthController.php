<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->route('cabinet.balance');
        }

        return back()->withErrors([
            'auth' => 'Неверное имя пользователя или пароль.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
