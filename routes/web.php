<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\WebsiteController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WebsiteController::class,'index'])->name('index');
Route::get('/about-us', [WebsiteController::class,'aboutUs'])->name('about.us');
Route::get('/products', [WebsiteController::class,'products'])->name('products');
Route::get('/services', [WebsiteController::class,'services'])->name('services');
Route::get('/blogs', [WebsiteController::class,'blogs'])->name('blogs');
Route::get('/contact-us', [WebsiteController::class,'contactUs'])->name('contact.us');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
