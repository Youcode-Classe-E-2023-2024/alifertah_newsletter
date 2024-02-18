<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\RegisterControl;
use App\Http\Controllers\RolesPermissions;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/forgotPassword', function () {
    return view('forgotPassword');
});



Route::post('/logout', [Logoutcontroller::class, 'destroy'])->name("logout");

Route::post("/subscribe", [NewsLetterController::class, 'subscribe'])->name("subscribe");
Route::post("/register", [RegisterControl::class, 'registerUser'])->name("register");
Route::post("/login", [UserController::class, 'login'])->name("login");
Route::post("/forgotPassword", [ForgotPasswordController::class, 'store'])->name("forgotPassword");

Route::post('passwordReset/{token}', [ForgotPasswordController::class, 'reset'])->name('password.reset');
Route::get('passwordReset/{token}', [ForgotPasswordController::class, 'init']);

Route::post('/rolesPermissions', [RolesPermissions::class, "changeRole"])->name("changeRole");



Route::post('/uploadMedia', [UploadController::class, "store"])->name("uploadMedia");






Route::middleware('isLoggedIn')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); 
    Route::get('/newsLetterEditor', [UploadController::class, "newsLetterEditor"])->name("newsLetterEditor");
    Route::get('/uploadMedia', function () {return view('mediaUpload');});
    Route::get('/rolesPermissions', [RolesPermissions::class, "show"]);
});
