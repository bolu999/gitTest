<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/{user?}', 'HomeController@index')->name('home');
// Route::get('/user/dashboard', 'HomeController@userDashboard');

Route::post('/admin/search','AdminController@liveAdminProductSearch');
Route::post('/admin/search/category','AdminController@liveAdminCategorySearch');
Route::post('/admin/search/user','AdminController@liveAdminUserSearch');
Route::post('/search','HomeController@liveSearch')->name('search');
Route::get('/home/products', 'HomeController@getProducts');
Route::get('/get/banner', 'HomeController@getBanner');
Route::get('/get/footer', 'HomeController@getFooterDetails');
Route::get('/home/details', 'HomeController@getHomeDetails');
Route::post('/send/mail', 'HomeController@sendMail');
Route::get('/submit/email/{email}', 'HomeController@submitEmail');


Route::get('/shop/allcategories', 'ShopController@getAllCategories');
Route::get('/shop/allproducts/{sort?}/{order?}', 'ShopController@getAllProducts');
Route::get('/shop/singleproduct/{id}', 'ShopController@getSingleProduct');
Route::get('/product/related_product/{category_id}/{id}', 'ShopController@getRelatedProduct');
Route::get('/shop/categoryproducts/{id}/{sort?}/{order?}', 'ShopController@getCategoryProducts');
Route::get('/fullsearch/{sort?}/{order?}/{keyword}','ShopController@Search');
Route::post('/save/rating','ShopController@saveRating');

Route::Post('/verify','PaymentController@verifyPayment');
Route::get('/apply/coupon/{code}','PaymentController@applyCoupon');
Route::get('/receipt/{ref}','PaymentController@getReceiptDetails');

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/getuserOrders', 'UserController@getUserOrders');
Route::post('/updateprofile', 'UserController@updateProfile');
Route::get('/get/profile/details', 'UserController@getUserDetails');
Route::get('/checklogin', 'UserController@checkLogin');
Route::get('/user/dashboard', 'UserController@getDashboardDetails');
Route::get('/add/wishlist/{id}', 'UserController@addToWishList');
Route::get('/get/user/Wishlist', 'UserController@getUserWishlist');
Route::get('/delete/wish/{id}', 'UserController@deleteWish');


// Admin 

Route::get('/admin/allorder', 'AdminController@getOrders');
Route::get('/orderdetail/{id}', 'AdminController@getOrderDetail');
Route::get('/admin/allusers', 'AdminController@getAllUsers');
Route::post('/product/image', 'AdminController@productImage');
Route::get('/admin/alldepartments', 'AdminController@getAllDepartments');
Route::post('/save/product', 'AdminController@newProduct');
Route::get('/delete/product/{id}', 'AdminController@deleteProduct');
Route::post('/edit/product', 'AdminController@editProduct');
Route::get('/admin/dashboard', 'AdminController@getDashboardDetails');
Route::post('/category/image', 'AdminController@categoryImage');
Route::post('/save/category', 'AdminController@newCategory');
Route::get('/shop/singlecategory/{id}', 'AdminController@getCategoryData');
Route::get('/delete/category/{id}', 'AdminController@deleteCategory');
Route::post('/edit/category', 'AdminController@editCategory');
Route::post('/department/image', 'AdminController@departmentImage');
Route::post('/save/department', 'AdminController@newDepartment');
Route::get('/admin/singledepartment/{id}', 'AdminController@getDepartmentData');
Route::post('/edit/department', 'AdminController@editDepartment');
Route::get('/delete/department/{id}', 'AdminController@deleteDepartment');
Route::get('/admin/user/{id}', 'AdminController@getUserData');
Route::get('/delete/user/{id}', 'AdminController@deleteUser');
Route::post('/edit/user', 'AdminController@editUser');
Route::post('/new/user', 'AdminController@newUser');
Route::get('/get/sitedetails', 'AdminController@siteSettings');
Route::post('/save/sitedetails', 'AdminController@saveSiteDetails');
Route::get('/all/coupons', 'AdminController@getCoupons');
Route::post('/save/coupon', 'AdminController@saveCoupon');
Route::get('/delete/coupon/{id}', 'AdminController@deleteCoupon');
Route::post('/edit/coupon', 'AdminController@editCoupon');
Route::get('/get/coupon/{id}', 'AdminController@getCoupon');
Route::post('/update/orderstatus', 'AdminController@updateOrderStatus');

