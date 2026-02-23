<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (
            $request->username === env('ADMIN_USERNAME') &&
            $request->password === env('ADMIN_PASSWORD')
        ) {
            session([
                'admin_logged_in' => true,
                'role' => 'admin',
            ]);

            $request->session()->regenerate();

            return redirect()->route('admin');
        }

        return back()->withErrors([
            'login' => 'Username atau password salah.'
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
