<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function check(AuthRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {

            return redirect('/dashboard');
        } else {
            return 'Gagal Masuk';
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
}
