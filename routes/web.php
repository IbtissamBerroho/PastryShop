<?php


use App\Http\Controllers\api\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FeaturesController;

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
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('features',FeaturesController::class)->middleware('auth');
Route::get("products/aff", [ProductController::class,'aff'])->name('products.aff');
Route::get('products/restore/{id}', [ProductController::class,'restore'])->name('products.restore');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
