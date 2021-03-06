<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\NotificationController;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/object', ObjectController::class)->middleware('verified');

Route::get('attribute/create', [AttributeController::class,'create'])->middleware('verified')->name('attribute.create');

Route::post('attribute', [AttributeController::class, 'store'])->middleware('verified')->name('attribute.store');

Route::get('users/notifications', [NotificationController::class, 'notifications'])->name('user.notification');