<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/hello', function(){
//     $team = ['sunny','ariful','noyon','mahedi'];
//     return view('hello', compact('team'));
// });


// all user role routes starts
Route::get('/role', [RoleController::class, 'addform']);
Route::post('/role/add', [RoleController::class, 'storerole']);
// all user role routes Ends

// all user Category routes starts
Route::get('/category/create',[CategoryController::class,'create']);
Route::post('/category/store',[CategoryController::class,'store']);
// all user Category routes Ends



