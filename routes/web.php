<?php

use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Admin All Routes
Route::prefix('/admin')->middleware(['guest:admin'])->group(function () {
    Route::get('/','App\Http\Controllers\Auth\Admin\AdminLoginController@loginForm')->name('adminLoginForm');
});

Route::get('/admin/register-form','App\Http\Controllers\Auth\Admin\AdminLoginController@registerForm')->name('adminResgisterForm');
Route::post('/admin/register', 'App\Http\Controllers\Auth\Admin\AdminLoginController@registerSubmit')->name('adminRegister');
Route::post('/admin/logined','App\Http\Controllers\Auth\Admin\AdminLoginController@adminLogin')->name('adminLogin');
Route::get('/signup_verify/{token}', 'App\Http\Controllers\Auth\Admin\AdminLoginController@signupVerify')->name('admin.signup.verify');
Route::get('/forget_password', 'App\Http\Controllers\Auth\Admin\AdminLoginController@resetPassword')->name('admin.forget_password');
Route::post('/forget_password/sendmail', 'App\Http\Controllers\Auth\Admin\AdminLoginController@sendMail')->name('admin.forget_password.sendmail');
Route::get('/admin.password/reset/view', 'App\Http\Controllers\Auth\Admin\AdminLoginController@resetpasswordView')->name('admin.forget_password.view');
Route::post('/forget_password/submit', 'App\Http\Controllers\Auth\Admin\AdminLoginController@resetPasswordSubmit')->name('admin.forget_password.submit');


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function(){
    Route::get('/dashboard','App\Http\Controllers\Backend\AdminController@adminDashboard')->name('admin.dashboard');
    //role admin register
    Route::resource('admin','Auth\Admin\AdminRegisterController');

    Route::post('logout','App\Http\Controllers\Backend\AdminController@adminLogout')->name('adminLogout');
    Route::get('/adminall','App\Http\Controllers\Backend\AdminController@adminGet')->name('adminall');
    Route::get('/updatepasswordform','App\Http\Controllers\Backend\AdminController@Update_passform')->name('updatepasswordform');
    Route::post('/updatepassword','App\Http\Controllers\Backend\AdminController@Update_pass')->name('updatepassword');
    Route::get('/profile/view', 'App\Http\Controllers\Backend\AdminController@profile')->name('admin.profile');
    Route::post('/profile/update', 'App\Http\Controllers\Backend\AdminController@updateProfile')->name('admin.profile.update');
    

    Route::get('brand/index','App\Http\Controllers\Backend\BrandController@index')->name('brand.index');
    Route::post('brand/store', 'App\Http\Controllers\Backend\BrandController@store')->name('brand.store');
    Route::post('brand/update', 'App\Http\Controllers\Backend\BrandController@brandUpdate')->name('update.brand');
    Route::delete('brand/delete/{id}', 'App\Http\Controllers\Backend\BrandController@destroy')->name('brand.destroy');

    Route::get('category/index', 'App\Http\Controllers\Backend\CategoryController@index')->name('category.index');
    Route::post('category/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
    Route::post('category/update', 'App\Http\Controllers\Backend\CategoryController@update')->name('update.category');
    Route::delete('category/delete/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('category.destroy');
 
    Route::resource('coupon','App\Http\Controllers\Backend\CouponController');
    Route::get('product/index', 'App\Http\Controllers\Backend\ProductController@index')->name('product.index');
    Route::post('product/store', 'App\Http\Controllers\Backend\ProductController@store')->name('product.store');
    Route::post('product/update', 'App\Http\Controllers\Backend\ProductController@update')->name('update.product');
    Route::delete('product/delete/{id}', 'App\Http\Controllers\Backend\ProductController@destroy')->name('product.destroy');
    // Route::resource('product','App\Http\Controllers\Backend\ProductController');
    Route::resource('product', 'App\Http\Controllers\Backend\ProductController');
    

    Route::get('/activeStatus/{id}','App\Http\Controllers\Backend\ProductController@activeStatus')->name('activeStatus');
    Route::get('/inactiveStatus/{id}','App\Http\Controllers\Backend\ProductController@inactiveStatus')->name('inactiveStatus');

    //Order management
    Route::get('pendding/order','App\Http\Controllers\Backend\OrderController@newOrder')->name('new.order');
    Route::get('payment/accept/order/','App\Http\Controllers\Backend\OrderController@acceptOrder')->name('payment.accept');
    Route::get('cancle/order/','App\Http\Controllers\Backend\OrderController@cancleOrder')->name('cancle.order');
    Route::get('proccess/order/','App\Http\Controllers\Backend\OrderController@orderProccess')->name('proccess.order');
    Route::get('order/deliverd/','App\Http\Controllers\Backend\OrderController@orderDeliverd')->name('order.deliverd');
    Route::get('view/order/{id}','App\Http\Controllers\Backend\OrderController@viewOrder')->name('view.order');
    //Order Status Change
    Route::get('change/order/status/{id}','App\Http\Controllers\Backend\OrderController@ChangeOrderStatus')->name('change.orderStatus');
    Route::get('cancle/order/status/{id}','App\Http\Controllers\Backend\OrderController@cancleOrderStatus')->name('cancle.orderStatus');
    Route::get('proccess/order/status/{id}','App\Http\Controllers\Backend\OrderController@ProcessOrderStatus')->name('proccess.orderStatus');
    Route::get('delivered/order/status/{id}','App\Http\Controllers\Backend\OrderController@DeliveredOrderStatus')->name('delivered.orderStatus');
    
    // invoice
    Route::get('order/invoice/{id}','App\Http\Controllers\Backend\OrderController@orderinvoice')->name('orderinvoice');
    //Order Report 
    Route::get('today/order/report','App\Http\Controllers\Backend\OrderReportController@todayOrder')->name('todayorder');
    Route::get('month/order/report','App\Http\Controllers\Backend\OrderReportController@thisMonthOrder')->name('monthorder');
    Route::get('year/order/report','App\Http\Controllers\Backend\OrderReportController@thisYearOrder')->name('yearorder');
    Route::get('alldelivered/order/report','App\Http\Controllers\Backend\OrderReportController@allDeliveryOrder')->name('alldeliveredorder');
    Route::get('all/cancle/order/report','App\Http\Controllers\Backend\OrderReportController@allCancleOrder')->name('allcancleorder');
    Route::get('report/search/order','App\Http\Controllers\Backend\OrderReportController@reportSearchOrder')->name('searchreportorder');
    Route::get('report/search/by/day','App\Http\Controllers\Backend\OrderReportController@searchByDay')->name('searchbyday');
    Route::get('report/search/by/month','App\Http\Controllers\Backend\OrderReportController@searchByMonth')->name('searchbymonth');
    Route::get('report/search/by/year','App\Http\Controllers\Backend\OrderReportController@searchByYear')->name('searchbyear');

    //Stock Management
    Route::get('stock/product/order', 'App\Http\Controllers\Backend\StcokController@stockProduct')->name('stockproduct');


     
});



// Users All Routes**************************************************************
//****************************************************************************** */

Route::get('/','App\Http\Controllers\Frontend\UserHomeController@userHome')->name('userHome');
Route::get('/test', 'App\Http\Controllers\Frontend\UserHomeController@storeProduct')->name('test');

Route::get('/user/signup_verify/{token}', 'App\Http\Controllers\Frontend\UserHomeController@signupVerify')->name('user.signup.verify');
Route::post('/user/login/submit', 'App\Http\Controllers\Frontend\UserHomeController@userLogin')->name('user.login.submit');
Route::get('/user/login/', 'App\Http\Controllers\Frontend\UserHomeController@userLoginForm')->name('user.login');

// Route::get('/home', 'HomeController@index')->name('home');

//wishlist
Route::group(['middleware' => ['auth:web']], function(){

Route::post('cartupdate/{id}','App\Http\Controllers\Frontend\CartController@cartUpdate')->name('cartUpdate');
Route::get('cart','App\Http\Controllers\Frontend\CartController@cartPage')->name('cartPage');

// Payment
Route::get('checkout/page','App\Http\Controllers\Frontend\PaymentController@checkoutPage')->name('checkoutPage');

//User Profile
Route::get('user/profile','App\Http\Controllers\Frontend\ProfileController@userProfile')->name('userProfile');
Route::post('user/profile/edit/{id}','App\Http\Controllers\Frontend\ProfileController@userProfileUpdate')->name('userProfileUpdate');
Route::get('user/password/page/','App\Http\Controllers\Frontend\ProfileController@userPassword')->name('userPassword');
Route::post('user/password/chnage/','App\Http\Controllers\Frontend\ProfileController@userPasswordChange')->name('userPasswordChange');
// User Invoice
Route::get('user/invoice{id}','App\Http\Controllers\Frontend\OrderController@userInvoice')->name('user.invoice');
Route::get('user/order/detail/{id}','App\Http\Controllers\Frontend\ProfileController@userOrderDetail')->name('userOrderDetail');

});

Route::get('cartdestroy/{id}','App\Http\Controllers\Frontend\CartController@cartDestroy')->name('cartdestroy');


//Wishlist count by ajax
Route::get('wishlist/count','App\Http\Controllers\Frontend\WishlistController@wishlistCount')->name('wishlistCount');

//Addtocart add and count by ajax
Route::get('addToCart/{id}','App\Http\Controllers\Frontend\CartController@addToCart')->name('addToCart');
// Route::get('/product/detail/addToCart/{id}','App\Http\Controllers\Frontend\CartController@producttoCart');
Route::get('cart/count','App\Http\Controllers\Frontend\CartController@cartCount')->name('cartCount');

//product By category
Route::get('/maincategory','App\Http\Controllers\Frontend\CategoryController@mainCategory')->name('maincategory');
Route::get('/subcategory/{slug}','App\Http\Controllers\Frontend\CategoryController@subCategory')->name('subcategory');
Route::get('/childcategory/{slug}','App\Http\Controllers\Frontend\CategoryController@childCategory')->name('childcategory');

Route::get('/categoryByProduct/{id}','App\Http\Controllers\Frontend\CategoryController@categoryByProduct')->name('categoryByProduct');

//product By category
Route::get('/maincatproduct/{name}','App\Http\Controllers\Frontend\ProductController@mainCatProduct')->name('maincatproduct');

Route::get('/productdetail/{id}','App\Http\Controllers\Frontend\ProductController@productDetail')->name('productdetail');

Route::post('stripe/page', 'App\Http\Controllers\Frontend\PaymentController@stripePage')->name('stripePage');
Route::get('quickproductview/{id}','App\Http\Controllers\Frontend\CartController@quickProductView');
Route::post('quickaddtocart','App\Http\Controllers\Frontend\CartController@quickAddToCart')->name('addtocartfromModal');
Route::post('product/page/addtocart/{id}','App\Http\Controllers\Frontend\CartController@productAddToCart')->name('producttoCart');

Route::get('cart/qty/increment/{id}','App\Http\Controllers\Frontend\CartController@qtyIncrement');
Route::get('cart/qty/decrement/{id}','App\Http\Controllers\Frontend\CartController@qtyDecrement');


Route::get('/addToCartcheck','App\Http\Controllers\Frontend\CartController@addToCartCheck');
Route::get('/fixdcart/content','App\Http\Controllers\Frontend\CartController@fixCartPage');
//Peoduct Search
Route::get('/product/search/','App\Http\Controllers\Frontend\SearchController@productSearch')->name('productsearch');
//Peoduct Search By Ajax
Route::get('/product/ajax/search/','App\Http\Controllers\Frontend\SearchController@ajaxSearch');
Route::get('/product/ajax/search/mobile','App\Http\Controllers\Frontend\SearchController@ajaxSearchMobile');



