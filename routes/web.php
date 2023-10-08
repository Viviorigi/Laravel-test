<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\fe\HomeController;
use App\Http\Controllers\fe\UserController;
use App\Http\Controllers\CartController;
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

//Route Fe

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postlogin']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'create']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/admin.login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin.login', [AdminController::class, 'postLogin'])->name('admin.postlogin');
Route::get('/admin.signout', [AdminController::class, 'signout'])->name('admin.signout');

Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail');

Route::post('/add-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');
    Route::resource('category', CategoryController::class);
    // Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    // Route::get('/category.add', [CategoryController::class, 'create'])->name('category.create');
    // Route::post('/category.add', [CategoryController::class, 'store'])->name('category.store');
    // Route::get('/category.edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    // Route::post('/category.edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    // Route::get('/category.delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    

    Route::resource('product', ProductController::class);
    // Route::get('/product',[ProductController::class,'index'])->name('product.index');
    // Route::get('/product.add', [ProductController::class, 'create'])->name('product.create');
    // Route::post('/product.add', [ProductController::class, 'store'])->name('product.store');
    // Route::get('/product.edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    // Route::post('/product.edit/{id}', [ProductController::class, 'update'])->name('product.update');
    // Route::get('/product.delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/category.trash',[CategoryController::class,'trash'])->name('category.trash');
    Route::get('/category.restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    Route::get('/category.forceDelete/{id}',[CategoryController::class,'forceDelete'])->name('category.forceDelete');
    Route::get('/product.trash',[ProductController::class,'trash'])->name('product.trash');
    Route::get('/product.restore/{id}',[ProductController::class,'restore'])->name('product.restore');
    Route::get('/product.forceDelete/{id}',[ProductController::class,'forceDelete'])->name('product.forceDelete');
});