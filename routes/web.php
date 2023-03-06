<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});

//Admin All Route
Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.store.profile');

Route::get('admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('admin/update/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');


//For Product Category
Route::get('all/product/category', [ProductController::class, 'AllProductCategory'])->name('all.product.category');
Route::get('add/product/category', [ProductController::class, 'AddProductCategory'])->name('add.product.category');
Route::post('store/product/category', [ProductController::class, 'StoreProductCategory'])->name('store.product.category');
Route::get('edit/product/category/{id}', [ProductController::class, 'EditProductCategory'])->name('edit.product.category');
Route::post('update/product/category', [ProductController::class, 'UpdateProductCategory'])->name('update.product.category');
Route::get('delete/product/category/{id}', [ProductController::class, 'DeleteProductCategory'])->name('delete.product.category');

//For Product
Route::get('all/product', [ProductController::class, 'AllProduct'])->name('all.product');
Route::get('add/product', [ProductController::class, 'AddProduct'])->name('add.product');
Route::post('store/product', [ProductController::class, 'StoreProduct'])->name('store.product');
Route::get('edit/product/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
Route::post('update/product', [ProductController::class, 'UpdateProduct'])->name('update.product');
Route::get('delete/product/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');
Route::get('product/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
Route::get('product/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
Route::get('add/photo/product/{id}', [ProductController::class, 'AddPhotoProduct'])->name('add.photo.product');
Route::post('store/photo/product', [ProductController::class, 'StorePhotoProduct'])->name('store.photo.product');
Route::get('edit/photo/product/{id}', [ProductController::class, 'EditPhotoProduct'])->name('edit.photo.product');
Route::get('product/photo/inactive/{id}', [ProductController::class, 'ProductPhotoInactive'])->name('product.photo.inactive');
Route::get('product/photo/active/{id}', [ProductController::class, 'ProductPhotoActive'])->name('product.photo.active');
Route::get('delete/photo/product/{id}', [ProductController::class, 'DeletePhotoProduct'])->name('delete.photo.product');


//For Slider 
Route::get('all/slider', [SliderController::class, 'AllSlider'])->name('all.slider');
Route::get('add/slider', [SliderController::class, 'AddSlider'])->name('add.slider');
Route::post('store/slider', [SliderController::class, 'StoreSlider'])->name('store.slider');
Route::get('edit/slider/{id}', [SliderController::class, 'EditSlider'])->name('edit.slider');
Route::post('update/slider', [SliderController::class, 'UpdateSlider'])->name('update.slider');
Route::get('slider/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
Route::get('slider/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
Route::get('delete/slider/{id}', [SliderController::class, 'DeleteSlider'])->name('delete.slider');

//Frontend All Route
Route::get('/', [IndexController::class, 'Index'])->name('/');
Route::get('products', [IndexController::class, 'AllProducts'])->name('products');
Route::get('product/category/{id}/{slug}', [IndexController::class, 'ProductCategory'])->name('category.products');
Route::get('product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

// -- For Product Modal --
Route::get('product/view/modal/{id}/', [IndexController::class, 'ProductViewAjax']);

// --Add To Cart Store Data--
Route::post('cart/data/store/{id}', [CartController::class, 'AddToCart']);

// --Get Data From Mini Cart--
Route::get('product/mini/cart', [CartController::class, 'AddMiniCart']);

//Frontend User
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// --Add To Wish List--
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);


Route::group(['prefiz' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    // --Wishlist Page--
    Route::get('wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
});




Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
