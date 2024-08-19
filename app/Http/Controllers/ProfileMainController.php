<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Import the Log facade
use App\Models\User;
use Inertia\Inertia;

class ProfileMainController extends Controller
{
    public function index()
    {
        $myProfile = User::first(); // Fetch the first user for demo purposes
        return Inertia::render('Admin/MyProfile', [
            'myProfile' => $myProfile
        ]);
    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_image' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        // Get the first user record (or you can fetch the authenticated user)
        $user = User::first(); // or $user = auth()->user();

        if ($user) {
            // Update user details
            $user->name = $request->name;
            $user->email = $request->email;

            // Handle password update
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            // Handle main image upload
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = 'profile_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/profile_images', $filename);

                // Delete the old image if it exists
                if ($user->profile_image && Storage::exists('public/profile_images/' . $user->profile_image)) {
                    Storage::delete('public/profile_images/' . $user->profile_image);
                }

                // Update the image path
                $user->profile_image = $filename;
            }

            Log::info($request->all());
    Log::info($request->file('profile_image'));

            // Save the updated user record
            $user->save();
        }

        // Return a response for Inertia
        return redirect()->route('admin.myprofile')->with('message', 'Profile updated successfully.');
    }
}
