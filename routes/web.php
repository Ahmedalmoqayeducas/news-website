<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\PostController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [newsController::class, 'index'])->name('news.parent');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('layouts.dashboard');
    })->name('dashboard');
    Route::resource('posts', PostController::class);
});

Route::get('/conatct', function () {
    return view('pages.contact');
})->name('news.conatct');
Route::prefix('news')->group(function () {
    Route::get('local', 'newsController@local')->name('thread.local');
    Route::get('sport', 'newsController@sport')->name('thread.sport');
    Route::get('international', 'newsController@international')->name('thread.international');
    Route::get('details/{id}', 'newsController@details')->name('thread.details');
});

Route::prefix('/dash')->group(function () {
    Route::get('/', function () {
        return view('layouts.dashboard');
    })->name('dashboard');
    Route::resource('admin', AdminController::class);
    Route::prefix('admin/trash')->group(function () {
        Route::get('/read', 'AdminController@trash')->name('trash.read');
        Route::get('/{id}', 'AdminController@restore')->name('trash.restore');
        Route::delete('/{id}', 'AdminController@forceDelete')->name('trash.forceDelete');
    });
});
