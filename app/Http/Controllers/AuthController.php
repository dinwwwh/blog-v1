<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a view login
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLogin()
    {
        return view('login');
    }

    /**
     * Handle login of user
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(
            $request->only(['email', 'password']),
            !!$request->remember
        )) {
            return redirect('/');
        }

        return redirect()
            ->back()
            ->with('errorLogin', 'Thông tin đăng nhập không chính xác.');
    }
}
