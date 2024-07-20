<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckActive;
use App\Http\Controllers\FrontPages;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeverageController;

Route::prefix('admin')->group(function () {
    Route::get('home', [DashController::class, 'home'])
        ->middleware(['verified', CheckActive::class])
        ->name('admin/home');
    

    Route::get('messages', [DashController::class, 'showMessages'])->name('messages');

    Route::get('login', [DashController::class, 'login'])->name('login');
    Route::post('logout', [DashController::class, 'logout'])->name('logout');

     // Beverages routes
     Route::get('beverages', [BeverageController::class, 'index'])->name('dashboard.beverages');
     Route::get('beverages/create', [BeverageController::class, 'create'])->name('addBeverage');
     Route::post('beverages/store', [BeverageController::class, 'store'])->name('storeBeverage');
     Route::get('beverages/edit/{beverage}', [BeverageController::class, 'edit'])->name('editBeverage');
     Route::put('/beverages/{beverage}', [BeverageController::class, 'update'])->name('updateBeverage');
     Route::delete('destroyBeverage', [BeverageController::class, 'destroy'])->name('deleteBeverage');

    Route::get('messages', [MessageController::class, 'index'])->name('indexMessages');
    Route::get('messages/{id}', [MessageController::class, 'show'])->name('showMessage');
    Route::delete('messages/{id}', [MessageController::class, 'destroy'])->name('deleteMessage');

    Route::get('users', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('users/create', [UserController::class, 'create'])->name('addUser');
    Route::post('users/store', [UserController::class, 'store'])->name('storeUser');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('editUser');
    Route::put('updateUser/{id}', [UserController::class, 'update'])->name('updateUser');
    
    Route::get('categories', [CategoryController::class, 'index'])->name('dashboard.categories');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('addCategory');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('storeCategory');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::put('updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::delete('categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');
});


// Show list of categories


Route::get('/contactUs', [ContactController::class, 'show'])->name('contactUs.show');
Route::post('/contactUs', [ContactController::class, 'store'])->name('contactUs.store');


// Route::get('/', [FrontPages::class, 'index'])->name('index');

Route::get('/aboutUs', [FrontPages::class, 'aboutUs'])->name('aboutUs');
Route::get('/contactUs', [FrontPages::class, 'contactUs'])->name('contactUs');
Route::get('/specialItems', [FrontPages::class, 'specialItems'])->name('specialItems');
Route::get('/menu', [FrontPages::class, 'menu'])->name('menu');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify'=>true]);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
