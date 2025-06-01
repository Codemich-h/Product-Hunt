<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [AuthController::class, 'showLogin'])->name('login.account');
// Register Post Routes
Route::post('/', [AuthController::class, 'login'])->name('login');


//Register Route
Route::get('/register', [AuthController::class, 'showRegister'])->name('create.account');
//Register Post Routes
Route::post('/register', [AuthController::class, 'store'])->name('register');


Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('user.dashboard');


// Product Route
Route::co
// Route::get('/product/{id}', [ProductController::class, 'store']);

