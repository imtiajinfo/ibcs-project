<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::post('/reservation', [ReservationController::class, 'reserve'])->name('reservation.reserve');
Route::post('/contact', [ContactController::class, 'sendMessage'])->name('contact.send');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('slider', SliderController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('item', ItemController::class);

    Route::get('reservation', [App\Http\Controllers\Admin\ReservationController::class,'index'])->name('reservation.index');
    Route::post('/reservation/status/{id}',[App\Http\Controllers\Admin\ReservationController::class,'status'])->name('reservation.status');
    Route::post('/reservation/delete/{id}',[App\Http\Controllers\Admin\ReservationController::class,'destroy'])->name('reservation.destroy');


    Route::get('contact',[App\Http\Controllers\Admin\ContactController::class,'index'])->name('contact.index');
    Route::get('contact/{id}', [App\Http\Controllers\Admin\ContactController::class,'show'])->name('contact.show');
    Route::delete('contact/{id}', [App\Http\Controllers\Admin\ContactController::class,'destroy'])->name('contact.destroy');
});
