<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Home_main;
use Inertia\Inertia;

class HomeMainController extends Controller
{
    public function index()
    {
        $homeMain = Home_main::first();
        return Inertia::render('Admin/HomeCURD', [
            'homeMain' => $homeMain
        ]);
    }

    

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'mainImage' => 'nullable|image|mimes:jpg,jpeg,png',
        'secondaryImage' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    // Check if the table is empty
    $homeMain = Home_main::first();

    if ($homeMain) {
        // Table is not empty, update the existing record
        $homeMain->home_main_title = $request->title;
        $homeMain->home_main_content = $request->content;

        // Handle main image upload
        if ($request->hasFile('mainImage')) {
            $file = $request->file('mainImage');
            $filename = 'main_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename);

            // Delete the old image if it exists
            if ($homeMain->home_main_image && Storage::exists('public/images/' . $homeMain->home_main_image)) {
                Storage::delete('public/images/' . $homeMain->home_main_image);
            }

            // Update the image path
            $homeMain->home_main_image = $filename;
        }

        // Handle secondary image upload
        if ($request->hasFile('secondaryImage')) {
            $file = $request->file('secondaryImage');
            $filename = 'secondary_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename);

            // Delete the old image if it exists
            if ($homeMain->home_sec_image && Storage::exists('public/images/' . $homeMain->home_sec_image)) {
                Storage::delete('public/images/' . $homeMain->home_sec_image);
            }

            // Update the image path
            $homeMain->home_sec_image = $filename;
        }

        // Save the updated record
        $homeMain->save();
    } else {
        // Table is empty, create a new record
        $homeMain = new Home_main();
        $homeMain->home_main_title = $request->title;
        $homeMain->home_main_content = $request->content;

        // Handle main image upload
        if ($request->hasFile('mainImage')) {
            $file = $request->file('mainImage');
            $filename = 'main_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename);
            $homeMain->home_main_image = $filename;
        }

        // Handle secondary image upload
        if ($request->hasFile('secondaryImage')) {
            $file = $request->file('secondaryImage');
            $filename = 'secondary_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename);
            $homeMain->home_sec_image = $filename;
        }

        // Save the new record
        $homeMain->save();
    }

    // Redirect with a success message
    return Inertia::render('Admin/HomeCURD', [
        'homeMain' => Home_main::first(), // Ensure the latest data is passed
        'message' => 'Home main details saved successfully.',
    ]);
}

}
