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



    //Admin Category//
    
    Route::get('/product/categories/page', [AdminController::class, 'CategoryPage'])->name('category.page');
    Route::get('/add/product/category', [AdminController::class, 'AdminAddCategory'])->name('add.category');
    Route::post('/admin/categories-store', [AdminController::class, 'AdminCategoriesStore'])->name('admin.categories.store');
    Route::get('/admin/categories/edit{id}', [AdminController::class, 'AdminEditCategory'])->name('admin.edit.category');
    Route::put('/admin/categories/update{id}', [AdminController::class, 'AdminUpdateCategory'])->name('admin.update.category');
    Route::delete('/admin/categories/delete{id}', [AdminController::class, 'AdminDeleteCategory'])->name('admin.delete.category');


    //Admin Product
    
    
    Route::get('/admin/product', [AdminController::class, 'AdminProduct'])->name('admin.product');
    Route::get('/admin/add/product', [AdminController::class, 'AddProduct'])->name('admin.add.product');
    Route::post('/admin/product/store', [AdminController::class,'AdminProductStore'])->name('admin.product.store');
    Route::get('admin/product/{id}', [AdminController::class, 'AdminProductView'])->name('admin.product.view');
    Route::get('/admin/edit/product{id}', [AdminController::class, 'EditProduct'])->name('admin.edit.product');
    Route::put('admin/product/update/{id}', [AdminController::class, 'AdminUpdateProduct'])->name('admin.update.product');
    Route::delete('/admin/product/delete/{id}', [AdminController::class, 'AdminDeleteProduct'])->name('admin.delete.product');

    

});


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');