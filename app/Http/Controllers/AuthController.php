<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate(
                [
                    'email' => ['required', 'email', 'exists:users,email'],
                    'password' => ['required', 'min:5', "max:10"]

                ]
            );

            if (!Auth::attempt($credentials)) {
                return response()->json(['status' => false, 'message' => 'invalid credenatials'], 400);
            }
            $request->session()->regenerateToken();
            return response()->json(['status' => true, 'message' => "login successfull", 'redirect' => route('dashboard.index')]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->regenerateToken();
            $request->session()->invalidate();
            return redirect('/');
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
