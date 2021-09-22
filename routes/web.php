<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Models\User;



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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
   Route::get('/login',[AdminController::class,'loginForm']);
   Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});





Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

//-----------------------------Admin Route--------------------------------------

//---------------------------Admin Profile
Route::get('/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profileEdit');
Route::post('admin/profile/upadate',[AdminProfileController::class,'AdminProfileUpadate'])->name('admin.profile.upadate');
Route::get('admin/password/change',[AdminProfileController::class,'AdminUpdatePassword'])->name('admin.password.change');
Route::post('admin/password/update',[AdminProfileController::class,'AdminPasswordupdate'])->name('admin.change.password');


//----------------------------Admin--Brand---------------

Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class,'viewBrand'])->name('all.brand');
    Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
    Route::get('brand/edit/{id}',[BrandController::class,'Editbrand'])->name('brand.edit');
    Route::post('brand/update/{id}',[BrandController::class,'Updatedata'])->name('brand.update.store');
    Route::get('brand/delete/{id}',[BrandController::class,'DeleteBrand'])->name('brand.delete');
});


//----------------------Admin--Category-----------------------------
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class,'viewCategory'])->name('all.category');
    Route::post('/store',[CategoryController::class,'CategoeryStore'])->name('category.store');
    Route::get('edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
    Route::post('/update/{id}',[CategoryController::class,'UpdateCategory'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class,'DeleteCategory'])->name('category.delete');
   
    
});
//---------------------Admin-Sub-Category-----------------------------
Route::prefix('subcategory')->group(function(){
    Route::get('/view',[SubCategoryController::class,'viewSubcategory'])->name('all.sub.category');
    Route::post('/store',[SubcategoryController::class,'SubCategoryStore'])->name('subcategory.store');
    Route::get('edit/{id}',[SubCategoryController::class,'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/update/{id}',[SubCategoryController::class,'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/delete/{id}',[SubCategoryController::class,'DeleteSubCategory'])->name('delete.subcategory');
    Route::get('find/formcategory/{id}',[SubCategoryController::class,'SubcategoryFind']);

});

//---------------------Admin-Sub-sub-Category-----------------------------
Route::prefix('subsubcategory')->group(function(){
    Route::get('/view',[SubSubCategoryController::class,'viewSubSubcategory'])->name('all.sub.sub.category');
    Route::post('/store',[SubSubCategoryController::class,'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/edit/{id}',[SubSubCategoryController::class,'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('update/{id}',[SubSubCategoryController::class,'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('delete/{id}',[SubSubcategoryController::class,'SubSubCategoryDelete'])->name('subsubcategory.delete');
});

//------------Admin Add-Product--------------------------------------------
Route::prefix('product')->group(function(){
    Route::get('/add',[ProductController::class,'AddProduct'])->name('add.product');

   
});









//-------------------------------User Route---------------------------------------------------


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $data=User::find(Auth::user()->id);
    return view('dashboard',compact('data'));
})->name('dashboard');

Route::get('/',[IndexController::class,'index'])->name('home');
Route::get('user/logout',[IndexController::class,'logout'])->name('user.logout');
Route::get('user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('user/profile/update',[IndexController::class,'userprofileupdate'])->name('user.profile.update');
Route::get('user/change/password',[IndexController::class,'userpasswordchange'])->name('user.change.password');
Route::post('user/password/update',[IndexController::class,'Updatepass'])->name('user.password.update');