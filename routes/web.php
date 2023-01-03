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

// User

Route::get('/login', 'App\Http\Controllers\FrontendController@login')->name('login');
Route::post('login', 'App\Http\Controllers\FrontendController@loginSubmit')->name('login.submit');
Route::get('/logout', 'App\Http\Controllers\FrontendController@logout')->name('user.logout');

Route::get('/register', 'App\Http\Controllers\FrontendController@register')->name('register');
Route::post('register', 'App\Http\Controllers\FrontendController@registerSubmit')->name('register.submit');

// User section start
Route::group(['prefix'=>'/dashboard', 'middleware' => ['user']],function(){
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('user');

    // Profile
    Route::get('/profile', 'HomeController@profile')->name('user-profile');

    Route::post('/profile/{id}', 'HomeController@profileUpdate')->name('user-profile-update');

    //  Order
    Route::get('/order',"HomeController@orderIndex")->name('user.order.index');

    Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');

    Route::delete('/order/delete/{id}', 'HomeController@userOrderDelete')->name('user.order.delete');

    // Product Review
    Route::get('/user-review', 'HomeController@productReviewIndex')->name('user.productreview.index');

    Route::delete('/user-review/delete/{id}', 'HomeController@productReviewDelete')->name('user.productreview.delete');

    Route::get('/user-review/edit/{id}', 'HomeController@productReviewEdit')->name('user.productreview.edit');

    Route::patch('/user-review/update/{id}', 'HomeController@productReviewUpdate')->name('user.productreview.update');

    // Post comment
    Route::get('user-post/comment', 'HomeController@userComment')->name('user.post-comment.index');

    Route::delete('user-post/comment/delete/{id}', 'HomeController@userCommentDelete')->name('user.post-comment.delete');

    Route::get('user-post/comment/edit/{id}', 'HomeController@userCommentEdit')->name('user.post-comment.edit');

    Route::patch('user-post/comment/udpate/{id}', 'HomeController@userCommentUpdate')->name('user.post-comment.update');

    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');

    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');

});

// Frontend Routes
Route::get('/', 'App\Http\Controllers\FrontendController@home')->name('home');
Route::get('/about', 'App\Http\Controllers\FrontendController@about')->name('about');

Route::get('/product-grids','App\Http\Controllers\FrontendController@productGrids')->name('product-grids');
Route::get('/product-lists','App\Http\Controllers\FrontendController@productLists')->name('product-lists');
Route::match(['get','post'],'/filter','App\Http\Controllers\FrontendController@productFilter')->name('shop.filter');
Route::get('/product-cat/{slug}','App\Http\Controllers\FrontendController@productCat')->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}','App\Http\Controllers\FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-brand/{slug}','App\Http\Controllers\FrontendController@productBrand')->name('product-brand');

Route::get('/product', 'App\Http\Controllers\FrontendController@product')->name('product');
Route::get('/contact', 'App\Http\Controllers\FrontendController@contact')->name('contact');

// Cart
Route::get('/cart', 'App\Http\Controllers\FrontendController@cart')->name('cart');
Route::get('/add-to-cart/{slug}','App\Http\Controllers\CartController@addToCart')->name('add-to-cart')->middleware('user');
Route::post('/add-to-cart','App\Http\Controllers\CartController@singleAddToCart')->name('single-add-to-cart')->middleware('user');
Route::get('cart-delete/{id}','App\Http\Controllers\CartController@cartDelete')->name('cart-delete');
Route::post('cart-update','App\Http\Controllers\CartController@cartUpdate')->name('cart.update');

Route::get('/checkout', 'App\Http\Controllers\FrontendController@checkout')->name('checkout')->middleware('user');;
Route::get('/confirmation', 'App\Http\Controllers\FrontendController@confirmation')->name('confirmation');

// Blog
Route::get('/blog', 'App\Http\Controllers\FrontendController@blog')->name('blog');
Route::get('/blog-detail/{slug}', 'App\Http\Controllers\FrontendController@blogDetail')->name('blog.detail');
Route::get('/blog/search', 'App\Http\Controllers\FrontendController@blogSearch')->name('blog.search');
Route::post('/blog/filter', 'App\Http\Controllers\FrontendController@blogFilter')->name('blog.filter');
Route::get('blog-cat/{slug}', 'App\Http\Controllers\FrontendController@blogByCategory')->name('blog.category');
Route::get('blog-tag/{slug}', 'App\Http\Controllers\FrontendController@blogByTag')->name('blog.tag');

// Wishlist
Route::get('/wishlist',function(){
    return view('frontend.pages.wishlist');
})->name('wishlist');
Route::get('/wishlist/{slug}', 'App\Http\Controllers\WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}', 'App\Http\Controllers\WishlistController@wishlistDelete')->name('wishlist-delete');
Route::post('cart/order', 'App\Http\Controllers\OrderController@store')->name('cart.order');
Route::get('order/pdf/{id}', 'App\Http\Controllers\OrderController@pdf')->name('order.pdf');
Route::get('/income', 'App\Http\Controllers\OrderController@incomeChart')->name('product.order.income');

// NewsLetter
Route::post('/subscribe', 'App\Http\Controllers\FrontendController@subscribe')->name('subscribe');

// Backend section start
Route::group(['prefix'=>'/admin', 'middleware'=>['auth', 'admin']],function(){
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin');

    Route::get('/file-manager',function(){
        return view('backend.layouts.file-manager');
    })->name('file-manager');

    // user route
    Route::resource('users', 'App\Http\Controllers\UsersController');

    // Banner
    Route::resource('banner', 'App\Http\Controllers\BannerController');

    // Brand
    Route::resource('brand', 'App\Http\Controllers\BrandController');

    // Profile
    Route::get('/profile', 'App\Http\Controllers\AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}', 'App\Http\Controllers\AdminController@profileUpdate')->name('profile-update');

    // Category
    Route::resource('/category', 'App\Http\Controllers\CategoryController');

    // Product
    Route::resource('/product', 'App\Http\Controllers\ProductController');

    // Ajax for sub category
    Route::post('/category/{id}/child', 'App\Http\Controllers\CategoryController@getChildByParent');

    // POST category
    Route::resource('/post-category', 'App\Http\Controllers\PostCategoryController');

    // Post tag
    Route::resource('/post-tag', 'App\Http\Controllers\PostTagController');

    // Post
    Route::resource('/post', 'App\Http\Controllers\PostController');

    // Message
    Route::resource('/message', 'App\Http\Controllers\MessageController');
    Route::get('/message/five', 'App\Http\Controllers\MessageController@messageFive')->name('messages.five');

    // Order
    Route::resource('/order', 'App\Http\Controllers\OrderController');

    // Shipping
    Route::resource('/shipping', 'App\Http\Controllers\ShippingController');

    // Coupon
    Route::resource('/coupon', 'App\Http\Controllers\CouponController');

    // Settings
    Route::get('settings', 'App\Http\Controllers\AdminController@settings')->name('settings');
    Route::post('setting/update', 'App\Http\Controllers\AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}', 'App\Http\Controllers\NotificationController@show')->name('admin.notification');
    Route::get('/notifications', 'App\Http\Controllers\NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}', 'App\Http\Controllers\NotificationController@delete')->name('notification.delete');

    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
});
