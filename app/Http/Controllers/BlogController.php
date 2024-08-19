<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Inertia\Response;
use App\Models\Home_main;
use App\Models\Activity;

class BlogController extends Controller
{
    public function index()
    {
        // Fetch the blogs from the database
        $blogs = Blog::all();

        // Return data using Inertia
        return Inertia::render('Admin/BlogCURD', [
            'blogs' => $blogs,
        ]);
    }



    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'blog_file' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'created_by' => 'required|string',
            'created_dte' => 'required|date',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('blog_file')) {
            $file = $request->file('blog_file');
            // Generate a unique file name with a smaller size
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('blogs', $filename, 'public');
        }

        // Store blog data
        $blog = Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'created_by' => $request->input('created_by'),
            'created_dte' => $request->input('created_dte'),
            'image' => $filePath, // Store the file path in the database
        ]);

        // Redirect with Inertia
        return redirect()->route('admin.blogcurd')->with('success', 'Blog created successfully!');
    }

    public function update(Request $request, Blog $blog)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'created_by' => 'required|string',
            'created_dte' => 'required|date',
            'blog_file' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update the blog's basic information
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->created_by = $request->input('created_by');
        $blog->created_dte = $request->input('created_dte');

        // Check if a new file is uploaded
        if ($request->hasFile('blog_file')) {
            $file = $request->file('blog_file');
            // Generate a unique file name
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('blogs', $filename, 'public');

            // Delete the old image if it exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            // Update the image path in the database
            $blog->image = $path;
        }

        // Save the updated blog
        $blog->save();

        // Redirect with a success message
        return redirect()->route('admin.blogcurd')->with('success', 'Blog updated successfully.');
    }


    public function destroy(Blog $blog)
    {
        // Delete the blog image from storage if it exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        // Delete the blog record from the database
        $blog->delete();

        // Redirect with success message
        return redirect()->route('admin.blogcurd')->with('success', 'Blog deleted successfully.');
    }

    public function show(Request $request)
    {
        // Fetch paginated blogs, you can customize the per-page value as needed
        $blogs = Blog::paginate(10); // Fetch 10 blogs per page

        return Inertia::render('Website/Blog', [
            'blogs' => $blogs,
        ]);
    }

    public function home_show()
    {
        $blogs = Blog::all();
        $home_main = Home_main::all(); // Retrieve the data from the Home_main model
        $activity = Activity::all();

        return Inertia::render('Website/Home', [
            'blogs' => $blogs,
            'home_main' => $home_main,
            'activity' => $activity,
        ]);
    }


    public function show_sblog($id)
    {
        $blog = Blog::findOrFail($id);
        return Inertia::render('Website/BlogDT', [
            'layout' => 'website',
            'blog' => $blog, // Singular, since we're passing one blog
        ]);
    }
}
