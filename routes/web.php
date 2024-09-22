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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//team Category
Route::get('/manage-team-categories', [AdminController::class, 'viewTeamCategories'])->name('manage-team-categories');
Route::post('/add-team-category', [AdminController::class, 'addTeamCategory'])->name('add-team-category');
Route::put('/update-team-category/{id}', [AdminController::class, 'updateTeamCategory'])->name('update-team-category');
Route::delete('/delete-team-category/{id}', [AdminController::class, 'deleteTeamCategory'])->name('delete-team-category');


// Route::get('/', [FrontController::class, 'index']);
Route::get('/settings', [AdminController::class, 'showSettingsForm'])->name('settings');
Route::post('/settings/update-password', [AdminController::class, 'updatePassword'])->name('update.password');
Route::post('/settings/update-profile', [AdminController::class, 'updateProfile'])->name('update.profile');

