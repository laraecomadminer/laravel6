<?php

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

/*Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', 'PagesController@index')->name('index');
Route::get('/contact', 'PagesController@contact')->name('contact');

Route::get('/products', 'PagesController@products')->name('products');
//search routing
Route::get('/search', 'PagesController@search')->name('search');
Route::get('/admin/product/search', 'ProductController@search')->name('/admin/product/search');

Route::get('/product/{slug}', 'ProductController@show')->name('products.show');
//
Route::get('/categories', 'CategoriesController@index')->name('categories.index');
Route::get('/category/{id}', 'CategriesController@show')->name('categories.show');
//User Authentication an verification
Route::get('/user/{token}', 'VerificationController@verify')->name('user.verification');
Route::get('/userS/dashboard', 'UsersController@dashboard')->name('userS.dashboard');
Route::get('/userS/profile', 'UsersController@profile')->name('userS.profile');
Route::post('/userS/profile/update', 'UsersController@profileUpdate')->name('userS.profile.update');

//Carts Routing---------------------------
Route::group(['prefix'=>'carts'], function()
{
Route::get('/', 'CartsController@CartIndex')->name('carts');
Route::post('/store', 'CartsController@CartStore')->name('carts.store');
Route::post('/update/{id}', 'CartsController@CartUpdate')->name('carts.update');
Route::post('/delete/{id}', 'CartsController@CartDestroy')->name('carts.delete');
});
//Checkout Routing------------------------

Route::group(['prefix'=>'checkout'], function()
{
Route::get('/', 'CheckoutsoutController@CheckoutIndex')->name('checkouts');
Route::post('/store', 'CheckoutsoutController@CheckoutStore')->name('checkout.store');
});
//products route--------------------------
Route::group(['prefix'=>'admin'], function()
   {
   Route::get('/', 'AdminPagesController@index')->name('admin.products');
   Route::get('/product/create', 'ProductController@productCreate')->name('admin.product.create');
   Route::post('/product/create', 'ProductController@productStore')->name('admin.product.store');
   Route::get('/products', 'ProductController@manageProduct')->name('admin.products');
   Route::get('/product/edit/{id}', 'ProductController@productEdit')->name('admin.product.edit');
   Route::post('/product/edit/{id}', 'ProductController@productUpdate')->name('admin.product.update');
   Route::post('/product/delete/{id}', 'ProductController@productDelete')->name('admin.product.delete');
   }); 
	   
   //categories route--------------------
   Route::group(['prefix'=>'admin'], function()
{  
   Route::get('/categories', 'CategoryController@index')->name('admin.categories');
   Route::get('/category/create', 'CategoryController@categoryCreate')->name('admin.category.create');
   Route::post('/category/store', 'CategoryController@categoryStore')->name('admin.category.store');
   Route::get('/edit/{id}', 'CategoryController@editCategory')->name('admin.category.edit');
   Route::post('/category/edit/{id}', 'CategoryController@updateCategory')->name('admin.category.update');
   Route::post('/category/delete/{id}', 'CategoryController@deleteCategory')->name('admin.category.delete');
   
});
//brands route
   Route::group(['prefix'=>'admin'], function()
{
   //Route::get('/', 'CategoryController@index')->name('admin.index');
   
   Route::get('/brands', 'BrandController@index')->name('admin.brands');
   Route::get('/brand/create', 'BrandController@brandCreate')->name('admin.brand.create');
   Route::post('/brand/store', 'BrandController@brandStore')->name('admin.brand.store');
   Route::get('/edit/{id}', 'BrandController@editbrand')->name('admin.brand.edit');
   Route::post('/brand/edit/{id}', 'BrandController@updateBrand')->name('admin.brand.update');
   Route::post('/brand/delete/{id}', 'BrandController@deleteBrand')->name('admin.brand.delete');
   
});

	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	
   //division route-------------------------
   Route::group(['prefix'=>'admin'], function()
{
   //Route::get('/', 'CategoryController@index')->name('admin.index');
   Route::get('/divisions', 'DivisionController@index')->name('admin.divisions');
   Route::get('/division/create', 'DivisionController@divisionCreate')->name('admin.division.create');
   Route::post('/division/store', 'DivisionController@divisionStore')->name('admin.division.store');
   Route::get('/edit/{id}', 'DivisionController@editDivision')->name('admin.division.edit');
   Route::post('/division/edit/{id}', 'DivisionController@updateDivision')->name('admin.division.update');
   Route::post('/division/delete/{id}', 'DivisionController@deleteDivision')->name('admin.division.delete');
   
});
	
	//district route---------------------
	   Route::group(['prefix'=>'admin'], function()
	{
	   Route::get('/districts', 'DistrictController@index')->name('admin.districts');
	   Route::get('/district/create', 'DistrictController@districtCreate')->name('admin.district.create');
	   Route::post('/district/store', 'DistrictController@districtStore')->name('admin.district.store');
	   Route::get('/edit/{id}', 'DistrictController@editdistrict')->name('admin.district.edit');
	   Route::post('/district/edit/{id}', 'DistrictController@updateDistrict')->name('admin.district.update');
	   Route::post('/district/delete/{id}', 'DistrictController@deleteDistrict')->name('admin.district.delete');
	});
	