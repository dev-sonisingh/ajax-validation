<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;

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
    return view('ajax');
});


Route::post('submit-form', [PostController::class,'save'])->name('submit.form');

// Route::post('/contact', [ContactController::class,'store'])->name('contact.store');


Route::controller(PostController::class)->group(function(){
    Route::get('posts', 'index');
    Route::post('posts', 'store')->name('posts.store');
});