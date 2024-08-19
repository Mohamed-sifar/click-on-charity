<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\About_main;
use Inertia\Inertia;

class AboutMainController extends Controller
{
    public function index()
    {
        $aboutMain = About_main::first();
        return Inertia::render('Admin/AboutCURD', [
            'aboutMain' => $aboutMain
        ]);
    }

    public function about_show()
    {
        $about_main = About_main::all(); // Retrieve the data from the contact_main model

        return Inertia::render('Website/About', [
            'about_main' => $about_main,
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
    $aboutMain = About_main::first();

    if ($aboutMain) {
        // Table is not empty, update the existing record
        $aboutMain->about_title = $request->title;
        $aboutMain->about_main_content = $request->content;

        // Handle main image upload
        if ($request->hasFile('mainImage')) {
            $file = $request->file('mainImage');
            $filename = 'main_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images2', $filename);

            // Delete the old image if it exists
            if ($aboutMain->about_main_image && Storage::exists('public/images2/' . $aboutMain->about_main_image)) {
                Storage::delete('public/images2/' . $aboutMain->about_main_image);
            }

            // Update the image path
            $aboutMain->about_main_image = $filename;
        }

        // Handle secondary image upload
        if ($request->hasFile('secondaryImage')) {
            $file = $request->file('secondaryImage');
            $filename = 'secondary_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images2', $filename);

            // Delete the old image if it exists
            if ($aboutMain->about_sec_image && Storage::exists('public/images2/' . $aboutMain->about_sec_image)) {
                Storage::delete('public/images2/' . $aboutMain->about_sec_image);
            }

            // Update the image path
            $aboutMain->about_sec_image = $filename;
        }

        // Save the updated record
        $aboutMain->save();
    } else {
        // Table is empty, create a new record
        $aboutMain = new About_main();
        $aboutMain->about_title = $request->title;
        $aboutMain->about_main_content = $request->content;

        // Handle main image upload
        if ($request->hasFile('mainImage')) {
            $file = $request->file('mainImage');
            $filename = 'main_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images2', $filename);
            $aboutMain->about_main_image = $filename;
        }

        // Handle secondary image upload
        if ($request->hasFile('secondaryImage')) {
            $file = $request->file('secondaryImage');
            $filename = 'secondary_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images2', $filename);
            $aboutMain->about_sec_image = $filename;
        }

        // Save the new record
        $aboutMain->save();
    }

    // Redirect with a success message
    return Inertia::render('Admin/AboutCURD', [
        'aboutMain' => About_main::first(), // Ensure the latest data is passed
        'message' => 'About main details saved successfully.',
    ]);
}

}
