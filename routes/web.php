<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store']);
});

Route::middleware(['auth:sanctum,admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('admin/profile', [ProfileController::class, 'viewProfile'])->name('admin.profile');
    Route::get('admin/profile/edit', [ProfileController::class, 'editProfile'])->name('admin.profileEdit');
    Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::Post('admin/profile/update', [ProfileController::class, 'updateProfile'])->name('admin.profileUpdate');
    Route::get('admin/profile/change-password', [ProfileController::class, 'changePassword'])->name('admin.passwordUpdate');
    Route::post('admin/profile/update-password', [ProfileController::class, 'adminUpdatePassword'])->name('admin.adminUpdatePassword');
});
