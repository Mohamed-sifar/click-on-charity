<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Contact_main;
use Inertia\Inertia;

class ContactMainController extends Controller
{
    public function index()
    {
        $contactMain = Contact_main::first();
        return Inertia::render('Admin/ContactCURD', [
            'contactMain' => $contactMain
        ]);
    }

    public function contact_show()
    {
        $contact_main = Contact_main::all(); // Retrieve the data from the contact_main model

        return Inertia::render('Website/Contact', [
            'contact_main' => $contact_main,
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
        'thirdImage' => 'nullable|image|mimes:jpg,jpeg,png',
        'fourthImage' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    // Check if the table is empty
    $contactMain = Contact_main::first();

    if ($contactMain) {
        // Table is not empty, update the existing record
        $contactMain->contact_title = $request->title;
        $contactMain->contact_main_content = $request->content;

        // Handle main image upload
        if ($request->hasFile('mainImage')) {
            $file = $request->file('mainImage');
            $filename = 'main_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images3', $filename);

            // Delete the old image if it exists
            if ($contactMain->contact_image_1 && Storage::exists('public/images3/' . $contactMain->contact_image_1)) {
                Storage::delete('public/images3/' . $contactMain->contact_image_1);
            }

            // Update the image path
            $contactMain->contact_image_1 = $filename;
        }

        // Handle secondary image upload
        if ($request->hasFile('secondaryImage')) {
            $file = $request->file('secondaryImage');
            $filename = 'secondary_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images3', $filename);

            // Delete the old image if it exists
            if ($contactMain->contact_image_2 && Storage::exists('public/images3/' . $contactMain->contact_image_2)) {
                Storage::delete('public/images3/' . $contactMain->contact_image_2);
            }

            // Update the image path
            $contactMain->contact_image_2 = $filename;
        }

        if ($request->hasFile('thirdImage')) {
            $file = $request->file('thirdImage');
            $filename = 'third_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images3', $filename);

            // Delete the old image if it exists
            if ($contactMain->contact_image_3 && Storage::exists('public/images3/' . $contactMain->contact_image_3)) {
                Storage::delete('public/images3/' . $contactMain->contact_image_3);
            }

            // Update the image path
            $contactMain->contact_image_3 = $filename;
        }

        if ($request->hasFile('fourthImage')) {
            $file = $request->file('fourthImage');
            $filename = 'fourth_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images3', $filename);

            // Delete the old image if it exists
            if ($contactMain->contact_image_4 && Storage::exists('public/images3/' . $contactMain->contact_image_4)) {
                Storage::delete('public/images3/' . $contactMain->contact_image_4);
            }

            // Update the image path
            $contactMain->contact_image_4 = $filename;
        }

        // Save the updated record
        $contactMain->save();
    } else {
        // Table is empty, create a new record
        $contactMain = new Contact_main();
        $contactMain->contact_title = $request->title;
        $contactMain->contact_main_content = $request->content;

        // Handle main image upload
        if ($request->hasFile('mainImage')) {
            $file = $request->file('mainImage');
            $filename = 'main_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images3', $filename);
            $contactMain->contact_image_1 = $filename;
        }

        // Handle secondary image upload
        if ($request->hasFile('secondaryImage')) {
            $file = $request->file('secondaryImage');
            $filename = 'secondary_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images3', $filename);
            $contactMain->contact_image_2 = $filename;
        }

        if ($request->hasFile('thirdImage')) {
            $file = $request->file('thirdImage');
            $filename = 'third_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images3', $filename);
            $contactMain->contact_image_3 = $filename;
        }

        if ($request->hasFile('fourthImage')) {
            $file = $request->file('fourthImage');
            $filename = 'fourth_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images3', $filename);
            $contactMain->contact_image_4 = $filename;
        }

        // Save the new record
        $contactMain->save();
    }

    // Redirect with a success message
    return Inertia::render('Admin/ContactCURD', [
        'contactMain' => Contact_main::first(), // Ensure the latest data is passed
        'message' => 'Contact main details saved successfully.',
    ]);
}

}
