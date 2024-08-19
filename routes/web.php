<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeMainController;
use App\Http\Controllers\AboutMainController;
use App\Http\Controllers\ContactMainController;
use App\Http\Controllers\HelpRequestController;
use App\Http\Controllers\ProfileMainController;
use App\Http\Controllers\ContactController;
use Inertia\Inertia;

// Website routes
Route::get('/', function () {
    return Inertia::render('Website/Home', ['layout' => 'website']);
});

Route::get('/about', function () {
    return Inertia::render('Website/About', ['layout' => 'website']);
});

Route::get('/about-us', function () {
    return Inertia::render('Website/About-us', ['layout' => 'website']);
});

Route::get('/blogs', function () {
    return Inertia::render('Website/Blogs', ['layout' => 'website']);
});

Route::get('/blog-details', function () {
    return Inertia::render('Website/BlogDT', ['layout' => 'website']);
});

Route::get('/activity', function () {
    return Inertia::render('Website/Activity', ['layout' => 'website']);
});

Route::get('/contact', function () {
    return Inertia::render('Website/Contact', ['layout' => 'website']);
});

Route::get('/activities', function () {
    return Inertia::render('Website/Activities', ['layout' => 'website']);
});

Route::get('/contact', function () {
    return Inertia::render('Website/Contact', ['layout' => 'website']);
});

Route::get('/need-help', function () {
    return Inertia::render('Website/NeedHelp', ['layout' => 'website']);
});

Route::get('/blog', [BlogController::class, 'show'])->name('blog');
Route::get('/blog-details/{id}', [BlogController::class, 'show_sblog'])->name('blog.details');

Route::get('/', [BlogController::class, 'home_show'])->name('home.show');

Route::get('/contact', [ContactMainController::class, 'contact_show'])->name('contact.show');

Route::get('/about', [AboutMainController::class, 'about_show'])->name('about.show');

Route::get('/activity', [ActivityController::class, 'show'])->name('activity');

Route::get('/activity-details/{id}', [ActivityController::class, 'show_sactiviy'])->name('activity.details');

Route::post('/need-help', [HelpRequestController::class, 'store'])->name('nedd.help');

Route::post('/contact-us', [ContactController::class, 'store'])->name('contactus.store');

// Admin routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', function () {
        return Inertia::render('Admin/Dashboard', ['layout' => 'admin']);
    })->name('admin.dashboard'); // Ensure the route name is set

    Route::get('/admin/home-curd', function () {
        return Inertia::render('Admin/HomeCURD', ['layout' => 'admin']);
    })->name('admin.homecurd'); // Ensure the route name is set

    Route::get('/admin/about-curd', function () {
        return Inertia::render('Admin/AboutCURD', ['layout' => 'admin']);
    })->name('admin.aboutcurd'); // Ensure the route name is set


    Route::get('/admin/contact-curd', function () {
        return Inertia::render('Admin/ContactCURD', ['layout' => 'admin']);
    })->name('admin.contactcurd'); // Ensure the route name is set


    Route::get('admin/blog-curd', function () {
        return Inertia::render('Admin/BlogCURD', ['layout' => 'admin']);
    })->name('admin.blogcurd');

    Route::get('admin/activity-curd', function () {
        return Inertia::render('Admin/ActivityCURD', ['layout' => 'admin']);
    })->name('admin.activitycurd');

    Route::get('admin/needhelp-curd', function () {
        return Inertia::render('Admin/NeedHelpCURD', ['layout' => 'admin']);
    })->name('admin.needhelpcurd');

    Route::get('admin/my-profile', function () {
        return Inertia::render('Admin/MyProfile', ['layout' => 'admin']);
    })->name('admin.myprofile');

    Route::get('admin/contact-us', function () {
        return Inertia::render('Admin/ContactusCURD', ['layout' => 'admin']);
    })->name('admin.contactus');

    // In routes/web.php

    Route::get('/admin/blog-curd', [BlogController::class, 'index'])->name('admin.blogcurd');

    Route::post('/admin/blogs', [BlogController::class, 'store'])->name('blogs.store');

    Route::put('/admin/blogs/{blog}', [BlogController::class, 'update']);
    Route::post('/admin/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');


    Route::get('/admin/activity-curd', [ActivityController::class, 'index'])->name('admin.activitycurd');

    Route::post('/admin/activity', [ActivityController::class, 'store'])->name('activity.store');

    Route::put('/admin/activity/{activity}', [ActivityController::class, 'update']);
    Route::post('/admin/activity/{activity}', [ActivityController::class, 'destroy'])->name('activity.destroy');



    Route::get('/admin/home-curd', [HomeMainController::class, 'index'])->name('home-main.index');
    Route::post('/admin/home-curd', [HomeMainController::class, 'store'])->name('home-main.store');


    Route::get('/admin/about-curd', [AboutMainController::class, 'index'])->name('about-main.index');
    Route::post('/admin/about-curd', [AboutMainController::class, 'store'])->name('about-main.store');

    Route::get('/admin/contact-curd', [ContactMainController::class, 'index'])->name('contact-main.index');
    Route::post('/admin/contact-curd', [ContactMainController::class, 'store'])->name('contact-main.store');

    Route::get('/admin/needhelp-curd', [HelpRequestController::class, 'index'])->name('needhelp-curd.index');
    // Route to update a specific request by ID
    Route::post('/admin/needhelp-curd/{id}', [HelpRequestController::class, 'update'])->name('admin.needhelp.update');



    Route::get('/admin/my-profile', [ProfileMainController::class, 'index'])->name('admin.myprofile');
    // web.php
    Route::post('/admin/my-profile', [ProfileMainController::class, 'update'])->name('admin.myprofile.update');

    Route::get('/admin/contact-us', [ContactController::class, 'index'])->name('contactus.index');
    Route::delete('/admin/contact-us/{id}', [ContactController::class, 'destroy'])->name('contact-us.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Authentication routes
Route::get('/register', function () {
    return Inertia::render('Admin/Register', ['layout' => 'admin']);
})->name('register');

Route::get('/login', function () {
    return Inertia::render('Admin/Login', ['layout' => 'admin']);
})->name('login'); // Ensure the route name is set

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
