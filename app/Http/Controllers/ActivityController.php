<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Activity;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Inertia\Response;

class ActivityController extends Controller
{
    public function index()
    {
        // Fetch the blogs from the database
        $activity = Activity::all();

        // Return data using Inertia
        return Inertia::render('Admin/ActivityCURD', [
            'activity' => $activity,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'activity_image' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'activity_title' => 'required|string|max:255',
            'activity_content' => 'required|string',
            'start_time' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string',
            'date' => 'required|date',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('activity_image')) {
            $file = $request->file('activity_image');
            // Generate a unique file name with a smaller size
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('activity', $filename, 'public');
        }

        // Store blog data
        $activity = Activity::create([
            'activity_title' => $request->input('activity_title'),
            'activity_content' => $request->input('activity_content'),
            'start_time' => $request->input('start_time'),
            'date' => $request->input('date'),
            'phone' => $request->input('phone'),
            'location' => $request->input('location'),
            'activity_image' => $filePath, // Store the file path in the database
        ]);

        // Redirect with Inertia
        return redirect()->route('admin.activitycurd')->with('success', 'Activity created successfully!');
    }

    public function update(Request $request, Activity $activity)
{
    // Validate incoming request data
    $request->validate([
        'activity_title' => 'required|string|max:255',
        'activity_content' => 'required|string',
        'start_time' => 'required|string',
        'date' => 'required|date',
        'location' => 'required|string',
        'phone' => 'required|string',
        'activity_image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Update activity properties with request data
    $activity->activity_title = $request->activity_title;
    $activity->activity_content = $request->activity_content;
    $activity->start_time = $request->start_time;
    $activity->date = $request->date;
    $activity->phone = $request->phone;
    $activity->location = $request->location;

    // Check if a new image is uploaded
    if ($request->hasFile('activity_image')) {
        $file = $request->file('activity_image');

        // Generate a unique filename for the new image
        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();

        // Store the new image in the 'public/activity' directory
        $path = $file->storeAs('activity', $filename, 'public');

        // Check if the activity already has an image
        if ($activity->activity_image) {
            // Remove the old image from storage
            Storage::disk('public')->delete($activity->activity_image);
        }

        // Update activity with the new image path
        $activity->activity_image = $path;
    }

    // Save the updated activity to the database
    $activity->save();

    // Redirect to the admin activity page with a success message
    return redirect()->route('admin.activitycurd')->with('success', 'Activity updated successfully.');
}

    public function destroy(Activity $activity)
    {
        // Delete the blog image from storage if it exists
        if ($activity->activity_image) {
            Storage::disk('public')->delete($activity->activity_image);
        }

        // Delete the blog record from the database
        $activity->delete();

        // Redirect with success message
        return redirect()->route('admin.activitycurd')->with('success', 'Activity deleted successfully.');
    }

    public function show(Request $request)
    {
        // Fetch paginated blogs, you can customize the per-page value as needed
        $activity = Activity::paginate(10); 
        return Inertia::render('Website/Activity', [
            'activity' => $activity,
        ]);

        
        
    }

    public function home_show()
    {
        $activity = Activity::all();
        return Inertia::render('Website/Home', [
            'activity' => $activity,
        ]);
    }

    public function show_sactiviy($id)
    {
        $activity = Activity::findOrFail($id);
        return Inertia::render('Website/ActivityDT', [
            'layout' => 'website',
            'activity' => $activity, // Singular, since we're passing one blog
        ]);
    }
}
