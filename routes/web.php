<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;

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
//frontend routes 
Route::get('/', function () {
    return view('Front/index');
});






Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Users Route
Route::get('users', [AdminController::class, 'Userindex'])->name('users.index');
Route::post('users', [AdminController::class, 'Userstore'])->name('users.store');
Route::put('users/{id}', [AdminController::class, 'Userupdate'])->name('users.update');
Route::delete('users/{id}', [AdminController::class, 'Userdestroy'])->name('users.destroy');


// Announcements Route
Route::get('announcements', [AdminController::class, 'announcementindex'])->name('announcements.index');
Route::post('announcements', [AdminController::class, 'announcementstore'])->name('announcements.store');
Route::put('announcements/{id}', [AdminController::class, 'announcementupdate'])->name('announcements.update');
Route::delete('announcements/{id}', [AdminController::class, 'announcementdelete'])->name('announcements.delete');


// Product Routes
Route::get('/manage-products', [AdminController::class, 'Productindex'])->name('manage-products');
Route::post('/add-product', [AdminController::class, 'Productstore'])->name('add-product');
Route::put('/update-product/{id}', [AdminController::class, 'Productupdate'])->name('update-product');
Route::delete('/delete-product/{id}', [AdminController::class, 'Productdestroy'])->name('delete-product');

// Category management routes
Route::get('/manage-categories', [AdminController::class, 'viewCategories'])->name('manage-categories');
Route::post('/add-category', [AdminController::class, 'addCategory'])->name('add-category');
Route::put('/update-category/{id}', [AdminController::class, 'updateCategory'])->name('update-category');
Route::delete('/delete-category/{id}', [AdminController::class, 'deleteCategory'])->name('delete-category');

// Transactions Route
Route::get('transactions', [AdminController::class, 'TransactionIndex'])->name('transactions.index');

// Coupons Routes
Route::get('coupons', [AdminController::class, 'CouponIndex'])->name('coupons.index');
Route::post('coupons', [AdminController::class, 'CouponStore'])->name('coupons.store');
Route::put('coupons/{id}', [AdminController::class, 'CouponUpdate'])->name('coupons.update');
Route::delete('coupons/{id}', [AdminController::class, 'CouponDestroy'])->name('coupons.destroy');

// orders
Route::get('/orders', [AdminController::class, 'orderIndex'])->name('orders.index');
Route::post('/orders', [AdminController::class, 'orderStore'])->name('orders.store');
Route::put('/orders/{id}/status', [AdminController::class, 'orderStatusUpdate'])->name('orders.status.update');
Route::delete('/orders/{id}', [AdminController::class, 'orderDestroy'])->name('orders.destroy');


// Route::get('/', [FrontController::class, 'index']);
Route::get('/settings', [AdminController::class, 'showSettingsForm'])->name('settings');
Route::post('/settings/update-password', [AdminController::class, 'updatePassword'])->name('update.password');
Route::post('/settings/update-profile', [AdminController::class, 'updateProfile'])->name('update.profile');

// routes/web.php
Route::get('admin/blog-categories', [AdminController::class, 'blogCategoryIndex'])->name('blog.category.index');
Route::post('admin/blog-categories/store', [AdminController::class, 'blogCategoryStore'])->name('blog.category.store');
Route::put('admin/blog-categories/update/{id}', [AdminController::class, 'blogCategoryUpdate'])->name('blog.category.update');
Route::delete('admin/blog-categories/destroy/{id}', [AdminController::class, 'blogCategoryDestroy'])->name('blog.category.destroy');

// Blog Post Routes
Route::get('/admin/blog-posts', [AdminController::class, 'blogPostIndex'])->name('blog.post.index');
Route::post('/admin/blog-posts/store', [AdminController::class, 'blogPostStore'])->name('blog.post.store');
Route::put('/admin/blog-posts/update/{id}', [AdminController::class, 'blogPostUpdate'])->name('blog.post.update');
Route::delete('/admin/blog-posts/delete/{id}', [AdminController::class, 'blogPostDestroy'])->name('blog.post.destroy');


