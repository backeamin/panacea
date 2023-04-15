<?php

use App\Http\Controllers\Admin\BookShopsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ModelTestController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
})->name('index');

//Admin Routes
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function (){
    Route::resource('/category', CategoryController::class);
    Route::resource('/writer', WriterController::class);
    Route::resource('/book_shop', BookShopsController::class);
    Route::resource('/review', ReviewController::class);
    Route::resource('/slider', SlidersController::class);
    Route::resource('/message', MessageController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/options', OptionController::class);
    Route::resource('/model_test', ModelTestController::class);
    Route::resource('/questions', QuestionController::class);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



