<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    // return view('welcome');
    return view('auth.login', ['type_menu' => '']);
});

route::middleware(['auth', 'verified'])->group(function(){
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => '']);
    })->name('home')->middleware('can:dashboard');
    Route::get('profile-edit', function () {
        return view('pages.profile', ['type_menu' => '']);
    })->name('profile.edit');

    route::resource('user', UserController::class);
});



// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/register', function () {
//     return view('auth.register');
// });

// Route::get('/reset', function () {
//     return view('auth.reset');
// });

// Route::get('/verify', function () {
//     return view('auth.verify');
// });

// Route::get('/forgot', function () {
//     return view('auth.forgot');
// });
