<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CargoController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ReturnController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\AllUserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CartPageController;
use App\Http\Controllers\Frontend\CashController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\StripeController;
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


//For Coupon 
Route::get('all/coupon', [CouponController::class, 'AllCoupon'])->name('all.coupon');
Route::get('add/coupon', [CouponController::class, 'AddCoupon'])->name('add.coupon');
Route::post('store/coupon', [CouponController::class, 'StoreCoupon'])->name('store.coupon');
Route::get('edit/coupon/{id}', [CouponController::class, 'EditCoupon'])->name('edit.coupon');
Route::post('update/coupon', [CouponController::class, 'UpdateCoupon'])->name('update.coupon');
Route::get('coupon/inactive/{id}', [CouponController::class, 'CouponInactive'])->name('coupon.inactive');
Route::get('coupon/active/{id}', [CouponController::class, 'CouponActive'])->name('coupon.active');
Route::get('delete/coupon/{id}', [CouponController::class, 'DeleteCoupon'])->name('delete.coupon');


//For Shipping 
Route::get('all/shipping', [ShippingController::class, 'AllShipping'])->name('all.shipping');
Route::get('add/shipping', [ShippingController::class, 'AddShipping'])->name('add.shipping');
Route::post('store/shipping', [ShippingController::class, 'StoreShipping'])->name('store.shipping');
Route::get('edit/shipping/{id}', [ShippingController::class, 'EditShipping'])->name('edit.shipping');
Route::post('update/shipping', [ShippingController::class, 'UpdateShipping'])->name('update.shipping');
Route::get('delete/shipping/{id}', [ShippingController::class, 'DeleteShipping'])->name('delete.shipping');


//For Shipping District
Route::get('all/shipping/district', [ShippingController::class, 'AllShippingDistrict'])->name('all.shipping.district');
Route::get('add/shipping/district', [ShippingController::class, 'AddShippingDistrict'])->name('add.shipping.district');
Route::post('store/shipping/district', [ShippingController::class, 'StoreShippingDistrict'])->name('store.shipping.district');
Route::get('edit/shipping/district/{id}', [ShippingController::class, 'EditShippingDistrict'])->name('edit.shipping.district');
Route::post('update/shipping/district', [ShippingController::class, 'UpdateShippingDistrict'])->name('update.shipping.district');
Route::get('delete/shipping/district/{id}', [ShippingController::class, 'DeleteShippingDistrict'])->name('delete.shipping.district');


Route::prefix('orders')->group(function () {

    // --Admin Order All Routes--
    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending.orders');
    Route::get('/pending/order/details/{order_id}', [OrderController::class, 'PendingOrderDetails'])->name('pending.order.details');

    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed.orders');

    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing.orders');

    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked.orders');

    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped.orders');

    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered.orders');

    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('admin.cancel.orders');

    // Order Status Update

    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');

    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');

    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');

    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
});


// Reports All Route
Route::prefix('reports')->group(function () {

    Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');

    Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');

    Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');

    Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
});

// Users All Route
Route::prefix('alluser')->group(function () {

    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
});

// Site Setting Route
Route::prefix('setting')->group(function () {

    Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
    Route::post('/site/store', [SiteSettingController::class, 'SettingsStore'])->name('settings.store');

    Route::get('/seo', [SiteSettingController::class, 'SEOSetting'])->name('seo.setting');
    Route::post('/seo/store', [SiteSettingController::class, 'SEOStore'])->name('seo.store');
});

// Return Order Route
Route::prefix('return')->group(function () {

    Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');
    Route::get('/admin/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');
});

// Review Route
Route::prefix('review')->group(function () {

    Route::get('/all', [ReviewController::class, 'AllReview'])->name('all.review');

    Route::get('/review/approve{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');

    Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
});

// Admin User Role Route 
Route::prefix('adminuserrole')->group(function () {

    Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');

    Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');

    Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');

    Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');

    Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');

    Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');

});




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


// Frontend Product Review All Route 
Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');




Route::group(['middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    // --Wishlist Page--
    Route::get('wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

    //--Stripe--
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

    //--Cash--
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    //--My Orders--
    Route::get('my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);


    Route::post('return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');

    Route::get('return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');

    Route::get('cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');
});

// --My Cart Page--
Route::get('mycart', [CartPageController::class, 'MyCart'])->name('mycart');
Route::get('get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
Route::get('cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
Route::get('cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

// --Coupon Apply--
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// --Checkout Page--
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');




Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
