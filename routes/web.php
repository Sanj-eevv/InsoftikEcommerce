<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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
        return view('backend.admin_panel.index');
    })->name('dashboard');

    Route::get('admin/profile', [ProfileController::class, 'viewProfile'])->name('admin.profile');
    Route::get('admin/profile/edit', [ProfileController::class, 'editProfile'])->name('admin.profileEdit');
    Route::Post('admin/profile/update', [ProfileController::class, 'updateProfile'])->name('admin.profileUpdate');
    Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('admin/profile/change-password', [ProfileController::class, 'changePassword'])->name('admin.passwordChange');
    Route::post('admin/profile/update-password', [ProfileController::class, 'adminUpdatePassword'])->name('admin.passwordUpdate');


    Route::get('admin/product', [ProductController::class, 'listProduct'])->name('admin.product');


    Route::get('admin/category', [CategoryController::class, 'listCategory'])->name('admin.category');
    Route::post('admin/add-category', [CategoryController::class, 'addCategory'])->name('admin.addCategory');
    Route::get('admin/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');

    Route::get('admin/sub-category', [CategoryController::class, 'listSubCategory'])->name('admin.subCategory');
    Route::post('admin/add-sub-category', [CategoryController::class, 'addSubCategory'])->name('admin.addSubCategory');
    
});
