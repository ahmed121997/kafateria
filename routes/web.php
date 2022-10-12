<?php

use App\Http\Controllers\FatooraController;
use App\Http\Controllers\ProductController;
use App\Models\Fatoora;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class)->except([
    'show'
]);
Route::resource('fatoora', FatooraController::class)->except([

]);


Route::get('test',function(){
    return User::find(1)->fatoora()->get();
    return $users = User::ofName('ahmed ')->get();
   $products = Product::max100()->get();
   return $products;
});
