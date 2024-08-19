<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Check if a user already exists
        if (User::exists()) {
            return redirect()->back()->withErrors(['error' => 'User already created.'])->withInput();
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:30'],
            'email' => ['required', 'max:30', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user
        User::create([
            'name' => $request->name, // Fixed the key from last_name to name
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Account created successfully.');
    }
}
