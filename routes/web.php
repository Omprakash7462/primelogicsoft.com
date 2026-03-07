<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\WebsiteController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Master\CkeditorUploadController;
use App\Http\Controllers\Master\MasterDashboardController;
use App\Http\Controllers\Master\BlogsController;
use App\Http\Controllers\Master\CategoryController;
use App\Http\Controllers\Master\DestinationImportController;
use App\Http\Controllers\Master\DestinationManagementController;
use App\Http\Controllers\Master\TestimonialsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('primelogicsoft')->name('primelogicsoft.')->group(function () {
    Route::get('/cache', function() {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return '<center><h2> All Config Cache Cleared....</h2></center>';
    });

    Route::get('/migration-run', function() {
        if (app()->environment('local')) {
            Artisan::call('migrate');
            return '<center><h2>Migration done...</h2></center>';
        }
        return abort(403, 'Unauthorized action.');
    });

    Route::get('/seed-run', function () {
        if (app()->environment('local')) {
            Artisan::call('db:seed');
            return '<center><h2>Seeding done...</h2></center>';
        }
        return abort(403, 'Unauthorized action.');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WebsiteController::class,'index'])->name('index');
Route::get('/about-us', [WebsiteController::class,'aboutUs'])->name('about.us');
Route::get('/products', [WebsiteController::class,'products'])->name('products');
Route::get('/products/details/{slug}', [WebsiteController::class,'productsDetails'])->name('products.details');
Route::get('/projects', [WebsiteController::class,'projects'])->name('projects');
Route::get('/projects/details/{slug}', [WebsiteController::class,'projectsDetails'])->name('projects.details');
Route::get('/services', [WebsiteController::class,'services'])->name('services');
Route::get('/services/details/{slug}', [WebsiteController::class,'servicesDetails'])->name('services.details');
Route::get('/blogs', [WebsiteController::class,'blogs'])->name('blogs');
Route::get('/blogs/details/{slug}', [WebsiteController::class,'blogsDetails'])->name('blogs.details');
Route::get('/contact-us', [WebsiteController::class,'contactUs'])->name('contact.us');

Auth::routes();
Route::post('ckeditor/upload', [CkeditorUploadController::class, 'index'])->name('ckeditor.upload');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'IsMaster'])->group(function () {
    Route::prefix('master')->name('master.')->group(function () {
        Route::get('/dashboard', [MasterDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [MasterDashboardController::class, 'profile'])->name('profile');
        Route::post('/update/profile', [MasterDashboardController::class, 'updateProfile'])->name('update.profile');
        Route::get('/change/password', [MasterDashboardController::class, 'changePassword'])->name('change.password');
        Route::post('/update/password', [MasterDashboardController::class, 'updatePassword'])->name('update.password');
        
        Route::get('/contact-us', [MasterDashboardController::class, 'contactUs'])->name('contact.us');
        Route::get('/contact-us/delete/{id}', [MasterDashboardController::class, 'contactUsDelete'])->name('contact.us.delete');

        Route::get('/bulk/upload', [MasterDashboardController::class, 'bulkUpload'])->name('bulk.upload');
        Route::post('/bulk/upload/process', [MasterDashboardController::class, 'bulkUploadProcess'])->name('bulk.upload.process');
        Route::get('/bulk/upload/delete/{id}', [MasterDashboardController::class, 'bulkUploadDelete'])->name('bulk.upload.delete');

        Route::get('/user/details', [MasterDashboardController::class, 'userDetails'])->name('user.details');
        Route::get('/visitor/details', [MasterDashboardController::class, 'visitorDetails'])->name('visitor.details');
        
        Route::prefix('data')->name('data.')->group(function () {
            Route::get('/country', [MasterDashboardController::class, 'country'])->name('country');
            Route::get('/state', [MasterDashboardController::class, 'state'])->name('state');
            Route::get('/district', [MasterDashboardController::class, 'district'])->name('district');
            Route::get('/city', [MasterDashboardController::class, 'city'])->name('city');
        });

        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/index', [CategoryController::class, 'index'])->name('index');
            Route::post('/submit', [CategoryController::class, 'submit'])->name('submit');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        });

        Route::prefix('destination-import')->name('destination.import.')->group(function () {
            Route::get('/', [DestinationImportController::class, 'index'])->name('index');
            Route::post('/upload', [DestinationImportController::class, 'upload'])->name('upload');
        });

        Route::prefix('destination-management')->name('destination.management.')->group(function () {
            Route::get('/', [DestinationManagementController::class, 'index'])->name('index');
            Route::get('/create', [DestinationManagementController::class, 'create'])->name('create');
            Route::post('/submit', [DestinationManagementController::class, 'submit'])->name('submit');
            Route::get('/edit/{id}', [DestinationManagementController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [DestinationManagementController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [DestinationManagementController::class, 'delete'])->name('delete');
        });

        Route::prefix('blog')->name('blog.')->group(function () {
            Route::get('/index', [BlogsController::class, 'index'])->name('index');
            Route::post('/submit', [BlogsController::class, 'submit'])->name('submit');
            Route::get('/edit/{id}', [BlogsController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BlogsController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [BlogsController::class, 'delete'])->name('delete');
        });

        Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('/index', [TestimonialsController::class, 'index'])->name('index');
            Route::post('/submit', [TestimonialsController::class, 'submit'])->name('submit');
            Route::get('/edit/{id}', [TestimonialsController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [TestimonialsController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [TestimonialsController::class, 'delete'])->name('delete');
        });
    });
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});