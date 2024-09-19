<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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





require __DIR__ . '/auth.php';



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/Profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/Profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('/product/categories/page', [AdminController::class, 'CategoryPage'])->name('category.page');
    Route::get('/add/product/category', [AdminController::class, 'AdminAddCategory'])->name('add.category');
    Route::get('/edit/product/category', [AdminController::class, 'EditCategory'])->name('edit.category');
    Route::get('/admin/product', [AdminController::class, 'AdminProduct'])->name('admin.product.category');
    Route::get('/admin/add/product', [AdminController::class, 'AddProduct'])->name('admin.add.product');
    Route::get('/admin/edit/product', [AdminController::class, 'EditProduct'])->name('admin.edit.product');

    Route::post('/admin/product/store', [AdminController::class, 'AdminCategoriesStore'])->name('admin.product.store');

});


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');