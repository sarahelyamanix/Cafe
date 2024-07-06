<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPages;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ContactController;


Route::get('/contactUs', [ContactController::class, 'show'])->name('contactUs.show');
Route::post('/contactUs', [ContactController::class, 'store'])->name('contactUs.store');

Route::prefix('admin')->group(function () {
    Route::get('home', [DashController::class, 'home'])->name('home');
    Route::get('login', [DashController::class, 'login'])->name('login');
});

// Route::get('/', [FrontPages::class, 'index'])->name('index');

Route::get('/aboutUs', [FrontPages::class, 'aboutUs'])->name('aboutUs');
Route::get('/contactUs', [FrontPages::class, 'contactUs'])->name('contactUs');
Route::get('/specialItems', [FrontPages::class, 'specialItems'])->name('specialItems');
Route::get('/menu', [FrontPages::class, 'menu'])->name('menu');

// Route::get('/', function () {
//     return view('test');
// });