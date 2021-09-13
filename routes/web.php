<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
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



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');



//-----------------------------Admin Route--------------------------------------

Route::get('/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profileEdit');
Route::post('admin/profile/upadate',[AdminProfileController::class,'AdminProfileUpadate'])->name('admin.profile.upadate');
Route::get('admin/password/change',[AdminProfileController::class,'AdminUpdatePassword'])->name('admin.password.change');
Route::post('admin/password/update',[AdminProfileController::class,'AdminPasswordupdate'])->name('admin.change.password');


//----------------------------------------------------------

Route::get('/',[IndexController::class,'index']);