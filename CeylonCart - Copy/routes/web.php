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

Route::get('/', function () {
    return view('welcome');
});

//***************************************************Piyumi********************************************************** */
Route::get('/','LoginController@index');
Route::get('/login','LoginController@index');
Auth::routes();
//Route::get('/home','HomeController@indexviewhome ');
Route::get('homepage','LoginController@indexviewhome');


Route::get('category','LoginController@SelectCategoryIndex')->name('category');
Route::get('customer','LoginController@SelectCustomer');
Route::get('supplier','LoginController@SelectSupplier');

Route::post('category','LoginController@StoreCategory')->name('category');
Route::post('category', function () {
    DB::table('Users')->insert(request()->only('category'));
});
//product
Route::get('addProduct','supplierController@index2');
Route::post('addProduct','productController@StoreProduct')->name('addProduct');
Route::post('updateProduct','productController@updateProduct')->name('updateProduct');
Route::post('deleteProduct','productController@deleteProduct')->name('deleteProduct');

//login
Route::get('/','LoginController@index');
Route::post('/','LoginController@StoreLoginData')->name('cclogin');
Route::post('/', 'LoginController@LoginUser')->name('cclogin');

Route::get('signout',['uses'=>'LoginController@logout','as'=>'signout']);

//customer
Route::get('/customer',['uses'=>'customerController@customerReg','as'=>'customer']);
Route::post('customer', 'customerController@cusdash');
Route::post('customer', 'customerController@addCustomer');
Route::post('customerProfile','customerController@displayProfile')->name('customerProfie');
Route::post('customerProfile','customerController@getProfile')->name('customerProfile');
Route::get('customerProfile','customerController@displayProfileCus')->name('supplierProfile');
Route::get('customer.edit/{id}','customerController@edit');
Route::post('update/{id}','customerController@update');


//supplier

Route::get('supplier',['uses'=>'supplierController@supplierReg' ,'as'=>'supplier']);
Route::post('supplier', 'supplierController@addSupplier');
Route::get('supplierProfile','supplierController@getProfile')->name('supplierProfile');
Route::get('/supplierdash','supplierController@supdash');

Route::get('/supplierProfile/{id}','supplierController@viewProfile')->name('supplierProfile');

Route::get('supplierProfile','supplierController@displayProfileSup')->name('supplierProfile');
Route::get('supplier.edit2/{id}','supplierController@edit');
Route::get('/supplier/editprofile','supplierController@edit');
Route::post('update2/{id}','supplierController@update');

Route::get('/supplierdash','supplierController@supplierdash');






//************************************************************************************* */


//*****************************************Hansana******************************************** */

///Admin-Dashboard
Route::get('/admin', 'adminController@dashboard');
Route::get('/admin/viewuser/customer/{id}', 'adminController@viewcustomer');
Route::get('/admin/viewuser/supplier/{id}', 'adminController@viewsupplier');

//View users
Route::get('admin/mailbox/{email}', 'adminController@mailusers');
Route::get('admin/removeuser/customer/{id}', 'adminController@removecustomer');
Route::get('admin/removeuser/supplier/{id}', 'adminController@removesupplier');

///Admin-Advertisements
Route::resource('/admin/advertisements', 'advertismentController');
Route::get('/deleteAds/{id}', 'advertismentController@remove');//destroy
Route::post('/updateAds/{id}', 'advertismentController@update');

//Admin-Profile
Route::get('/admin/profile', 'adminController@viewprofile');
Route::post('/admin/profile/update', 'adminController@updateprofile');

//Admin-products
Route::get('/admin/products', 'adminController@viewproducts');
/* Route::get('/admin/addproducts', 'adminController@addproducts'); */
Route::post('/admin/products/store', 'adminController@productsstore');//save products
Route::get('/admin/manageproducts/{id}', 'adminController@manageproducts');//manage products
Route::post('admin/updateproductimages/{id}', 'adminController@updateproducts');//update products  
Route::get('/admin/deleteproduct/{id}', 'adminController@deleteproducts');

//Admin-MailBox
Route::get('/admin/mailbox', 'adminController@mailbox');
Route::post('/admin/sendmail', 'adminController@sendmail');

//Admin - customer list
Route::get('/admin/customerlist', 'adminController@viewcustomerslist');


//Supplier-orders
Route::get('/supplier/orders', 'supplierController@vieworders');

//Route::post('/supplier/orders/reserve', 'supplierController@updateorder');

//customer-orders
Route::get('/customer/orders', 'customerController@orders');
//Route::get('/customer/orders/{id}', 'customerController@vieworder');

Route::post('/customer/orders/reserve', 'reserveController@reserveorder');

//supplier-pages
Route::get('/supplier/myorders/{id}', 'supplierController@viewmyorders');/* ->middleware('auth'); */
Route::get('/customer/orders/{id}', 'supplierController@vieworders');

Route::post('/supplier/cancelOrder', 'reserveController@cancelOrder');
Route::post('/supplier/editOrder', 'reserveController@editOrder');



//************************************************************************************* */

//*******************************************Subashini****************************************** */

Route::get('/show', 'orderController@showorder');

Route::post('/upadtedata','orderController@upadteorder');


Route::get('/createOrder', 'orderController@getproductname');
Route::post('/h','orderController@createorder');

Route::get('/delete/{id}','orderController@removeorder');

Route::get('/se','SearchController@index');
Route::get('/search','SearchController@search');



Route::get('/reservedsppliers/{id}','orderController@reservedsuppliers');
//Route::get('/reservedsppliers/{id}','orderController@getproductnameandimage');
//Route::get('/show','ProjectController@showorder');


Route::get('/customerdashboard','orderController@customerdash');

Route::get('/viewreservedonesupplier/{supplierId}','orderController@viewreservedonesupplier');


Route::get('/showsuppliertocustomerdashboard','orderController@showordertocustomer');
Route::get('/customerdash','orderController@customerdashboard');

//************************************************************************************* */

//*******************************************Udara****************************************** */



Route::get('/suppliers/{supplierID}', 'supplierController@show');
/* Route::get('/supplierEdit/{supplierID}', 'supplierEditController@show'); */
Route::get('/supplierprofile', 'supplierEditController@show');


Route::post('/comments', 'CommentsController@store');//if u want u can change this into Route::resource('/comments', 'CommentsController');


Route::get('/autocomplete', 'LiveSearch@index');
Route::post('/autocomplete/fetch', 'LiveSearch@fetch')->name('LiveSearch.fetch');

Route::post('/search/searchproducts', 'livesearchController@search');

//************************************************************************************* */
//Test
Route::get('/test', function () {
    //return view('welcome');
    $this->assertTrue(true);
        return "Login Test";
});
