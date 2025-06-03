<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;




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

//Login Route
// Route::get('/', function() {
//     return view('auth.login'); 
// });
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login.account');
// // Register Post Routes
// Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login',  'showLogin')->name('login.account');
    Route::post('/login', 'login')->name('login');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/about', 'about')->name('home.about');
    Route::get('/contact', 'contact')->name('home.contact');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'show')->name('show.product');
    Route::get('/add.product', 'add')->name('home.add.product');
    Route::post('/store.product', 'store')->name('store.product');
    Route::get('/view.product/{id}', 'view')->name('view.product');
    Route::get('/edit.product/{id}/edit', 'edit')->name('edit.product');
    Route::get('/update.product/{id}/update', 'edit')->name('update.product');
});

//Register Route
Route::get('/register', [AuthController::class, 'showRegister'])->name('create.account');
//Register Post Routes
Route::post('/register', [AuthController::class, 'store'])->name('register');


Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('user.dashboard');


// Product Route
Route::get('/product/{id}', [ProductController::class, 'store']);

