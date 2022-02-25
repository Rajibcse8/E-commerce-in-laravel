<?php

use Illuminate\Support\Facades\Route;

//------------------Backend Controller----------------------------
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\controllers\Backend\CouponController;
use App\Http\controllers\Backend\ShippingAreaController;

//------------------------------------------------------------------


//------------------Frontend Controller-----------------------------
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;

//-------------------------------------------------------------------

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

//-----------------------------Admin Route----------------------------------------------------------------------------------

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
    Route::get('find/formsubcategory/{id}',[SubSubCategoryController::class,'SubSubCategoryFind']);
});

//------------Admin Add-Product--------------------------------------------
Route::prefix('product')->group(function(){
    Route::get('/add',[ProductController::class,'AddProduct'])->name('add.product');
    Route::post('/store',[ProductController::class,'StoreProduct'])->name('product.store');
    Route::get('/manage',[ProductController::class,'ManageProduct'])->name('manage.product');
    Route::get('/edit/{id}',[ProductController::class,'EditProduct'])->name('product.edit');
    Route::post('/update/{id}',[ProductController::class,'UpdateProduct'])->name('product.update');
    Route::post('/update/multiple/image',[ProductController::class,'UpdateImage'])->name('multiple.image.update');
    Route::post('update/main/image/{id}',[ProductController::class,'UpdateMainImage'])->name('main.image.update');
    Route::get('delete/multiple/image/{id}',[ProductController::class,'DeletemultiImage'])->name('delete.multiImg');
    Route::get('/makeinactive/{id}',[ProductController::class,'Inactive'])->name('make.product.inactive');
    Route::get('/makeactive/{id}',[ProductController::class,'Active'])->name('make.product.active');
    Route::get('/delete/product/{id}',[ProductController::class,'ProductDelete'])->name('product.delete');

    
});

//-------------------SLider Route------------------------------------------------------------------

 Route::prefix('slider')->group(function(){

    Route::get('/view',[SliderController::class,'ViewSlider'])->name('manage.slider');
    Route::post('/store',[SliderController::class,'StoreSlider'])->name('slider.store');
    Route::get('/edit/{id}',[SliderController::class,'EditSlider'])->name('slider.edit');
    Route::post('/update/{id}',[SliderController::class,'UpdateSlider'])->name('slider.update');
    Route::get('/delete/{id}',[SliderController::class,'DeleteSlider'])->name('slider.delete');
    Route::get('/makeinactive/{id}',[SliderController::class,'MakeInActive'])->name('makeinactive');
    Route::get('/makeactive/{id}',[SliderController::class,'MakeActive'])->name('makeactive');


 });

 //----------------------Coupon Route--------------------------------------------------------------

 Route::prefix('coupons')->group(function(){

  Route::get('/view',[CouponController::class,'Couponview'])->name('manage.coupon');
  Route::post('/store',[CouponController::class,'Store'])->name('coupon.store');
  Route::get('/edit/{id}',[CouponController::class,'Edit'])->name('coupon.edit');
  Route::post('/update/{id}',[CouponController::class,'Update'])->name('coupon.update');
  Route::get('/delete/{id}',[CouponController::class,'Delete'])->name('coupon.delete');


 });

 //------------------Shipping-Area Route-------------------------------------------------------

 Route::prefix('shipping')->group(function(){

    Route::get('/area/view',[ShippingAreaController::class,'AreaView'])->name('manage.shipping');
    Route::post('/area/store',[ShippingAreaController::class,'DivStore'])->name('shipping.store'); 
    Route::get('/division/edit/{id}',[ShippingAreaController::class,'DivEdit'])->name('divison.edit');
    Route::post('/division/update/{id}',[ShippingAreaController::class,'DivUpdate'])->name('division.update');
    Route::get('/division/delete/{id}',[ShippingAreaController::class,'DivDelete'])->name('division_delete');


    Route::get('/area/district',[ShippingAreaController::class,'DistrictView'])->name('ship.district');
    Route::post('/area/district/store',[ShippingAreaController::class,'DistrictStore'])->name('district.store');
    Route::get('/area/district/edit/{id}',[ShippingAreaController::class,'DistrictEdit'])->name('district.edit');
    Route::post('/area/district/update/{id}',[ShippingAreaController::class,'DistrictUpdate'])->name('district.update');
    Route::get('/area/district/delete/{id}',[ShippingAreaController::class,'DistrictDelete'])->name('district.delete');

  
    Route::get('/area/state',[ShippingAreaController::class,'StateView'])->name('ship.state');
    Route::post('/area/state/store',[ShippingAreaController::class,'StateStore'])->name('state.store');
    Route::get('/area/state/edit/{id}',[ShippingAreaController::class,'StateEdit'])->name('state.edit');
    Route::post('/area/state/update/{id}',[ShippingAreaController::class,'StateUpdate'])->name('state.update');
    Route::get('.area/state/delete/{id}',[ShippingAreaController::class,'Statedel'])->name('state.delete');
    

    
    
    
    
    
      

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
//Product-view-Route-------------------------------


//------------------------------------------Check-out Route------------------------------------------------------------------------------

Route::get('division/find/formdistrict/{division_id}',[CheckoutController::class,'find_district']);
Route::get('getstate/from/district/{district_id}',[CheckoutController::class,'find_state']);

Route::group(['middleware'=>['auth','user'],'namespace'=>'User'],function(){

    Route::post('checkout/payment',[CheckoutController::class,'CheckoutStore'])->name('checkout.store');
    Route::post('stripe/order',[StripeController::class,'StripeOrder'])->name('stripe.order');
});





//------------------------------------Frontend Route------------------------------------------------------

Route::get('/language/bangla',[LanguageController::class,'Bangla'])->name('bangla.language');
Route::get('/language/english',[LanguageController::class,'English'])->name('english.language');
Route::get('product/view/{id}',[IndexController::class,'ProductView'])->name('product.details');
Route::get('product/tag/view/{tags}',[IndexController::class,'ProductTagsView'])->name('tagwise.product.view');
Route::get('subcategory/product/view/{id}',[IndexController::class,'ProductSubCategoryView'])->name('subcategory.product.view');
Route::get('subsubcategory/product/view/{id}',[IndexController::class,'ProductSubSubCategoryView'])->name('subsubcategory.product.view');

//--------------------------------------------------------------------------------------------------------

//--------------------------------------------Ajax Route Start-------------------------------------------------

Route::get('/product/view/modal/{id}',[IndexController::class,'ProductViewAjax']);
Route::post('/cart/data/store/{id}',[CartController::class,'AddToCart']);
Route::get('product/mini/cart/',[CartController::class,'AddminiCart']);
Route::get('mini-cart/product/remove/{rowid}',[CartController::class,'RemoveMiniCart']);

//Wishlist--Route-Start

Route::group(['prefix'=>'user','middleware'=>['auth','user'],'namespace'=>'User'],function(){
   
  

Route::get('load/wishlist/product',[WishlistController::class,'GetWishlistProduct']);
Route::get('/remove/wishlist/item/{id}',[WishlistController::class,'RemoveWishlistItem']);
Route::get('/Wishlist/view',[WishlistController::class,'ViewWishlist'])->name('wishlist');


});
Route::post('add/to/wishlist/{id}',[WishlistController::class,'AddToWishList']); 
 

//Wishlist--Route--End


//CartPage--Route---Start
   
 Route::get('/mycartpage',[CartPageController::class,'MycartPage'])->name('mycartpage');
 Route::get('/user/cartpage/product',[CartPageController::class,'GetCartProduct']);
 Route::get('/remove/mycartpage/item/{id}',[cartPageController::class,'CartPageRemove']);
 Route::get('/mycartpage/qty/inc/{id}',[CartPageController::class,'CartQtyInc']);
 Route::get('/mycartpage/qty/dec/{id}',[CartPageController::class,'CartQtyDec']);

//CatrPage--Route---End

//Coupon-Apply-Start
 
Route::post('/coupon-apply',[CartController::class,'CouponApply']);
Route::get('/coupon/calculations',[CartController::class,'CouponCalculations']);
Route::get('/coupon-remove',[CartCOntroller::class,'CouponRemove']);

//Coupon-Apply-End

//--------------------------------------------Ajax Route END-------------------------------------------------


//Check-out Route

Route::get('/checkout',[CartController::class,'CheckoutCreate'])->name('checkout');
