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

Route::get('/cartdes/{id}', 'CartController@destroy');
Route::get('testwoi', function() {

    $p = App\Product::find(1);
    $t = App\Tag::find(2);

    $result = json_decode($p->tags, true);
    $array = array();

    $i = 0;
    foreach ($result as $r) {
      $array[$i] = $r['tag'];

      $i++;
    }

    return implode('...', $array);
    return $t->products;
});

Route::post('/search', 'ProductController@postSearch');
Route::paginate('/shop/search/{product_name}', 'ProductController@getSearch')->name('frontend.search');

Route::post('/cart/edit', 'CartController@edit');

Route::get('/cart', 'CartController@index')->name('cart');

Route::get('/c/r', function() {
  Cart::destroy();
});

Route::get('/cart/product/remove/{rowId}', [
    'as' => 'cart.product.remove',
    'uses' => 'CartController@getProductRemove'
]);

Route::post('/cart/product/update', [
    'as' => 'cart.product.update',
    'uses' => 'CartController@getProductUpdate'
]);

//Product
Route::get('/product', [
    'as' => 'product',
    'uses' => 'ProductController@getStore'
]);

Route::post('/product', [
    'as' => 'product',
    'uses' => 'ProductController@postStore'
]);

Route::get('/product/delete/{id}', [
    'as' => 'product.delete',
    'uses' => 'ProductController@getDelete'
]);

Route::get('/product/data', [
    'as' => 'products.datatable',
    'uses' => 'ProductController@anyData'
]);

//Tag
Route::get('/tag', [
    'as' => 'tag',
    'uses' => 'TagController@getIndex'
]);

Route::post('/tag', [
    'as' => 'tag',
    'uses' => 'TagController@postStore'
]);

Route::get('/tag/delete/{id}', [
    'as' => 'tag.delete',
    'uses' => 'TagController@getDelete'
]);

Route::get('/tag/data', [
    'as' => 'tags.datatable',
    'uses' => 'TagController@anyData'
]);

//Size
Route::get('/size', [
    'as' => 'size',
    'uses' => 'SizeController@getIndex'
]);

Route::post('/size', [
    'as' => 'size',
    'uses' => 'SizeController@postStore'
]);

Route::get('/size/delete/{id}', [
    'as' => 'size.delete',
    'uses' => 'SizeController@getDelete'
]);

Route::get('/size/data', [
    'as' => 'sizes.datatable',
    'uses' => 'SizeController@anyData'
]);

//Category
Route::get('/category', [
    'as' => 'category',
    'uses' => 'CategoryController@getIndex'
]);

Route::post('/category', [
    'as' => 'category',
    'uses' => 'CategoryController@postStore'
]);

Route::post('/category/update', [
    'as' => 'category.update',
    'uses' => 'CategoryController@postUpdate'
]);

Route::get('/category/delete/{id}', [
    'as' => 'category.delete',
    'uses' => 'CategoryController@getDelete'
]);

Route::get('/categories/data', [
    'as' => 'categories.datatable',
    'uses' => 'CategoryController@anyData'
]);

//Slider Image
Route::get('/adminimg', [
    'as' => 'slider.image',
    'uses' => 'SliderImageController@getIndex'
]);

Route::post('/adminimg', [
    'uses' => 'SliderImageController@postStore'
]);

Route::get('/adminimg/slider/delete/{id}', [
    'as' => 'slider.image.delete',
    'uses' => 'SliderImageController@getDelete'
]);

Route::post('/adminimg/slider/update', [
    'as' => 'slider.image.update',
    'uses' => 'SliderImageController@postUpdate'
]);

Route::group(['middleware' => ['web']], function() {
    Route::get('/image', [
        'as' => 'imageupload',
        'uses' => 'ImageController@upload'
    ]);

    Route::post('/imageUploadForm', 'ImageController@store');

    Route::get('/showLists', [
        'as' => 'imageshow',
        'uses' => 'ImageController@show'
    ]);
});

Route::get('/', [
    'as' => 'index',
    'uses' => 'ProductController@getHomePage'
]);

Route::paginate('/shop&filterBy={filter_id?}', [
    'as' => 'shop',
    'uses' => 'ProductController@getShopPage'
]);

Route::paginate('/sale&filterBy={filter_id?}', [
    'as' => 'sale',
    'uses' => 'ProductController@getSalePage'
]);

Route::get('/item/{$id}', [
    'as' => 'item.id',
    'uses' => 'ItemController@getItem'
]);

Route::get('/item/info/{id}', [
    'as' => 'product.page.id',
    'uses' => 'ProductController@getProductPage'
]);

Route::get('/settings', [
    'as' => 'settings',
    'uses' => 'UserController@getSettings'
]);

Route::get('/register', [
    'as' => 'frontend.register',
    'uses' => 'UserController@getRegisterPage'
]);

Route::post('/register', [
    'uses' => 'UserController@postRegister'
]);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin/login', [
        'as' => 'admin.login',
        'uses' => 'AdminController@getLogin'
    ]);

Route::post('/admin/login', [
        'as' => 'admin.login',
        'uses' => 'AdminController@postLogin'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth.addition'], function() {
    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'AdminController@getIndex'
    ]);

    Route::get('/daftar-transaksi', [
        'as' => 'admin.daftar.transaksi',
        'uses' => 'TransactionController@getAdminTransactionPage'
    ]);

    Route::get('/daftar-transaksi/update/{id}', [
        'as' => 'update.transaction.status',
        'uses' => 'TransactionController@getUpdateTransactionStatus'
    ]);

    Route::get('/transaction/data', [
        'as' => 'admin.transactions.datatable',
        'uses' => 'TransactionController@adminAnyData'
    ]);

    Route::get('/logout', [
              'as' => 'admin.logout',
              'uses' => 'AdminController@getLogout'
    ]);
});

Route::group(['prefix' => 'user'], function() {

  Route::get('/daftar-pesanan', [
      'as' => 'daftar.pesanan',
      'uses' => 'UserController@getDaftarPesanan'
  ]);

  Route::post('/cart', [
      'uses' => 'CartController@postCart'
  ]);

  Route::get('/transaction/data/{email}', [
      'as' => 'transactions.datatable',
      'uses' => 'UserController@anyData'
  ]);



  Route::post('login', 'Auth\LoginController@login');
  //Route::post('logout', 'Auth\LoginController@logout')->name('logout');

  // Password Reset Routes...
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});


Route::group(['middleware' => 'auth'], function () {
    #adminlte_routes
});
