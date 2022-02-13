<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{RoleController,HomeController,CategoryController,subcategoryController,ProductController,FrontendController,BannerController};


 
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
Route::get('/',[FrontendController::class, 'index']);

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
Route::prefix('category')->group(function(){
 Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
 Route::post('/store',[CategoryController::class,'store']);
 Route::get('/index',[CategoryController::class,'index'])->name('category.index');
 Route::get('/delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
 Route::get('/trashed',[CategoryController::class,'deletedCategory'])->name('category.trashed');
 Route::get('/restore/{id}',[CategoryController::class,'categoryrestore'])->name('category.restore'); 
 Route::get('/vanish/{id}',[CategoryController::class,'vanish'])->name('category.force'); 
 Route::get('/edit/{id}',[CategoryController::class,'edit']); 
 Route::post('/update',[CategoryController::class,'update'])->name('category.update'); 
 // all user Category routes Ends
});


// all subcategory starts
Route::prefix('subcategory')->group(function(){
    Route::get('/create',[subcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/store',[subcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/index',[subcategoryController::class, 'index'])->name('subcategory.index');
});
// all subcategory ends

// all products starts
Route::prefix('product')->group(function(){
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
    Route::get('index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('update', [ProductController::class, 'update'])->name('product.update');
});    
// all products ends
// all-Banner-part
Route::prefix('banner')->group(function(){
    Route::get('create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('store', [BannerController::class, 'store'])->name('banner.store');
}); 
// all-Banner-part 

 Route::get('/user/dashboard',function(){
     return "your dashboard pore";
 });






