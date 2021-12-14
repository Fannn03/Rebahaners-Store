<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserProductController;

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


Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index-page');
    
    Route::get('/register', [AuthController::class, 'register_view'])->name('register');
    Route::get('/login', [AuthController::class, 'login_view'])->name('login');

    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', [AuthController::class, 'logoutGet'])->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::prefix('/admin-dashboard')->group(function () {

        Route::get('/', [IndexAdminController::class, 'index'])->name('admin-dashboard');

        // Category

        Route::get('/category', [CategoryController::class, 'index'])->name('admin-category');

        Route::get('/category/{code}', [CategoryController::class , 'editView'])->name('edit-category');
        Route::post('/category/{code}', [CategoryController::class, 'update'])->name('edit-category');

        Route::get('/category/delete/{code}', [CategoryController::class, 'delete'])->name('delete-category');

        Route::get('/new-category', [CategoryController::class, 'storeView'])->name('new-category');
        Route::post('/new-category', [CategoryController::class, 'store'])->name('new-category');

        // Product

        Route::get('/product', [ProductController::class, 'index'])->name('admin-product');

        Route::get('/product/{code}');

        Route::get('/product/delete/{code}', [ProductController::class, 'delete'])->name('delete-product');

        Route::get('/new-product', [ProductController::class, 'storeView'])->name('new-product');
        Route::post('/new-product', [ProductController::class, 'store'])->name('new-product');

    });
});

Route::middleware('auth')->group(function(){

    Route::get('/category/{slug}', [UserProductController::class, 'index']);

});