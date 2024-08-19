<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return Inertia::render('Admin/Login', [
                'errors' => $validator->errors(),
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return Inertia::render('Admin/Login', [
                'errors' => [
                    'email' => ['The provided credentials are incorrect.']
                ],
            ]);
        }

        Auth::login($user);

        // Redirect to the admin dashboard after successful login
        return Inertia::location('/admin'); // Use redirect route to ensure a clean redirect
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login page
        return redirect()->route('login'); // Using named routes
    }
}
