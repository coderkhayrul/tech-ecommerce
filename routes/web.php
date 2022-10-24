<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use \App\Http\Controllers\Admin\SettingController;
use \App\Http\Controllers\Admin\ReturnController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ContactController;

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

// -----------------------------------------------------------
// <------------------- FRONTEND ROUTE LIST ----------------->
// -----------------------------------------------------------

Route::get('/', function () {
    return view('pages.index');
});

Auth::routes(['verify' => true]);

Route::post('store/newslater', [FrontendController::class, 'storenewslater'])->name('store.newslater');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/password/change', [HomeController::class, 'changePassword'])->name('web.password.change');
Route::post('/password/update', [HomeController::class, 'updatePassword'])->name('web.password.update');
Route::get('/user/logout', [HomeController::class, 'logout'])->name('user.logout');
// WISHLIST ROUTES
Route::get('/add/wishlist/{id}', [WishlistController::class, 'addwishlist'])->name('add.wishlish');
// CART ROUTES
Route::get('/cart/check', [CartController::class, 'cartcheck'])->name('cart.check'); //Cart Test Route

Route::get('/add/to/cart/{id}', [CartController::class, 'addtocart'])->name('add.to.cart');
Route::get('/product/cart', [CartController::class, 'showCart'])->name('show.cart');
Route::get('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('remove.cart');
Route::post('/update.cart/item/{rowId}', [CartController::class, 'updateCartItem'])->name('update.cart.item');
Route::get('/cart/product/view/{id}', [CartController::class, 'viewProduct'])->name('cart.product.view');
Route::post('/insert/into/cart', [CartController::class, 'insertCart'])->name('insert.into.cart');

// CHECKOUT ROUTE LIST
Route::get('checkout', [CartController::class, 'checkout'])->name('user.checkout');

// WISHLIST ROUTE LIST
Route::get('wishlist', [CartController::class, 'wishlist'])->name('user.wishlish');

// COUPON ROUTE LIST
Route::post('apply/coupon/', [CartController::class, 'applyCoupon'])->name('apply.coupon');
Route::get('remove/coupon/', [CartController::class, 'removeCoupon'])->name('coupon.remove');


// PRODUCT ROUTES
Route::get('/product/details/{id}/{product_name}', [App\Http\Controllers\ProductController::class, 'viewproduct'])->name('product.details');
Route::post('/cart/product/add/{id}', [App\Http\Controllers\ProductController::class, 'addCart'])->name('cart.product.store');

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'productView'])->name('product.view');
Route::get('/category/product/{id}', [App\Http\Controllers\ProductController::class, 'categoryView'])->name('category.product');




// BLOG ROUTE LIST
Route::get('/blog', [BlogController::class, 'blogPost'])->name('blog.post');
Route::get('/blog/{id}', [BlogController::class, 'singleBlogPost'])->name('single.blog.post');

// LANGUAGE ROUTE LIST
Route::get('/language/english', [BlogController::class, 'english'])->name('language.english');
Route::get('/language/hindi', [BlogController::class, 'hindi'])->name('language.hindi');

// PAYMENT ROUTE LIST
Route::get('/payment', [CartController::class, 'paymentPage'])->name('payment.step');
Route::post('/payment/prosess', [PaymentController::class, 'payment'])->name('payment.prosess');
Route::post('/stripe/charge', [PaymentController::class, 'stripeCharge'])->name('stripe.charge');

// USER ORDER VIEW ROUTE LIST
Route::get('/order-view/{id}', [HomeController::class, 'orderView'])->name('user.order.view');

// USER ORDER TRACKING ROUTE LIST
Route::post('/order/tracking', [HomeController::class, 'orderTrack'])->name('user.order.tracking');

// RETURN ORDER ROUTE LIST
Route::get('/success/order', [PaymentController::class, 'successOrderList'])->name('web.success.order.list');
Route::get('/product/return/{id}', [PaymentController::class, 'orderReturn'])->name('web.product.return');
// RETURN ORDER ROUTE LIST
Route::get('/contact', [ContactController::class, 'Contact'])->name('web.contact.page');
Route::post('/contact', [ContactController::class, 'contactStore'])->name('web.contact.store');
//Product Search Route

Route::post('/search', [CartController::class, 'productSearch'])->name('web.product.search');

// -----------------------------------------------------------
// <------------------- ADMIN ROUTE LIST -------------------->
// -----------------------------------------------------------

Route::get('admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin', [LoginController::class, 'showLoginFrom'])->name('admin.login');
Route::post('/admin', [LoginController::class, 'login']);

Route::get('admin/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin-password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/reset/password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/update/reset', [ResetPasswordController::class, 'reset'])->name('admin.reset.update');
Route::get('/admin/Change/Password', [AdminController::class, 'ChangePassword'])->name('admin.password.change');
Route::post('/admin/password/update', [AdminController::class, 'Update_pass'])->name('admin.password.update');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// <-++++++++++++++++++++ ADMIN CATEGORY ROUTE LIST +++++++++++++++++++++++++->

Route::get('/admin/categories', [CategoryController::class, 'category'])->name('admin.categories');
Route::post('/admin/store/category', [CategoryController::class, 'storecategory'])->name('admin.store.category');
Route::get('/admin/delete/category/{id}', [CategoryController::class, 'deletecategory'])->name('admin.delete.category');
Route::get('/admin/edit/category/{id}', [CategoryController::class, 'editcategory'])->name('admin.edit.category');
Route::post('/admin/update/category/{id}', [CategoryController::class, 'updatecategory'])->name('admin.update.category');

// <-++++++++++++++++++++ ADMIN ROLE ROUTE LIST +++++++++++++++++++++++++->

Route::get('/admin/all/user', [UserRoleController::class, 'userRole'])->name('admin.all.users');
Route::get('/admin/create/admin', [UserRoleController::class, 'createUser'])->name('create.admin');
Route::post('/admin/store/admin', [UserRoleController::class, 'storeUser'])->name('admin.store');
Route::get('/admin/edit/admin/{id}', [UserRoleController::class, 'editUser'])->name('admin.edit');
Route::post('/admin/update/admin/{id}', [UserRoleController::class, 'updateUser'])->name('admin.update');
Route::get('/admin/delete/admin/{id}', [UserRoleController::class, 'deleteUser'])->name('admin.delete');
//++++++++++++ ADMIN SITE SETTING ROUTE ++++++++++++++
Route::get('/admin/site/setting', [SettingController::class, 'siteSetting'])->name('admin.site.setting');
Route::post('/admin/site/setting', [SettingController::class, 'siteSettingUpdate'])->name('admin.site.setting.update');

// <-++++++++++++++++++++ ADMIN BRAND ROUTE LIST +++++++++++++++++++++++++->

Route::get('/admin/brands', [BrandController::class, 'brand'])->name('admin.brands');
Route::post('/admin/store/brands', [BrandController::class, 'storebrand'])->name('admin.store.brand');
Route::get('/admin/delete/brand/{id}', [BrandController::class, 'deletebrand'])->name('admin.delete.brand');
Route::get('/admin/edit/brand/{id}', [BrandController::class, 'editbrand'])->name('admin.edit.brand');
Route::post('/admin/update/brand/{id}', [BrandController::class, 'updatebrand'])->name('admin.update.brand');

// <-++++++++++++++++++++ ADMIN SUB-CATEGORY ROUTE LIST +++++++++++++++++++++++++->

Route::get('/admin/sub/category', [SubCategoryController::class, 'subcategories'])->name('admin.sub.categories');
Route::post('/admin/store/sub/category', [SubCategoryController::class, 'storesubcategory'])->name('admin.store.sub.category');
Route::get('/admin/delete/sub/category/{id}', [SubCategoryController::class, 'deletesubcategory'])->name('admin.delete.sub.category');
Route::get('/admin/edit/sub/category/{id}', [SubCategoryController::class, 'editsubcategory'])->name('admin.edit.sub.category');
Route::post('/admin/update/sub/category/{id}', [SubCategoryController::class, 'updatesubcategory'])->name('admin.update.sub.category');

// <-++++++++++++++++++++ ADMIN COUPON ROUTE LIST +++++++++++++++++++++++++->

Route::get('/admin/sub/coupon', [CouponController::class, 'coupon'])->name('admin.coupon');
Route::post('/admin/store/coupon', [CouponController::class, 'storecoupon'])->name('admin.store.coupon');
Route::get('/admin/delete/coupon/{id}', [CouponController::class, 'deletecoupon'])->name('admin.delete.coupon');
Route::get('/admin/edit/coupon/{id}', [CouponController::class, 'editcoupon'])->name('admin.edit.coupon');
Route::post('/admin/update/coupon/{id}', [CouponController::class, 'updatecoupon'])->name('admin.update.coupon');

// <-++++++++++++++++++++ ADMIN NEWSLATER ROUTE LIST +++++++++++++++++++++++++->

Route::get('/admin/sub/newslater', [CouponController::class, 'newslater'])->name('admin.newslater');
Route::get('/admin/delete/newslater/{id}', [CouponController::class, 'deletenewslater'])->name('admin.delete.newslater');

// <-++++++++++++++++++++ ADMIN PRODUCT ROUTE LIST +++++++++++++++++++++++++->
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.all.product');
Route::get('/admin/product/add', [ProductController::class, 'create'])->name('admin.add.product');
Route::post('/admin/store/product', [ProductController::class, 'storeproduct'])->name('admin.store.product');
Route::get('/admin/delete/product/{id}', [ProductController::class, 'deleteproduct'])->name('admin.delete.product');
Route::get('/admin/view/product/{id}', [ProductController::class, 'viewproduct'])->name('admin.view.product');
Route::get('/admin/edit/product/{id}', [ProductController::class, 'editproduct'])->name('admin.edit.product');
Route::post('/admin/update/with/product/{id}', [ProductController::class, 'updatewithproduct'])->name('admin.update.with.product');
Route::post('/admin/update/without/product/{id}', [ProductController::class, 'updatewithoutproduct'])->name('admin.update.without.product');
// Product Status Active Or Inactive
Route::get('/admin/active/product/{id}', [ProductController::class, 'productactive'])->name('admin.active.product');
Route::get('/admin/inactive/product/{id}', [ProductController::class, 'productinactive'])->name('admin.inactive.product');
// Sub Category Get For Product With Ajax
Route::get('get/subcategory/{category_id}', [ProductController::class, 'getsubcategory'])->name('admin.get.subcategory');

// <-++++++++++++++++++++ ADMIN BLOG POST CATEGORY ROUTE LIST +++++++++++++++++++++++++->
Route::get('/admin/blog/categories', [PostController::class, 'blogcategory'])->name('admin.all.blog.category');
Route::post('/admin/store/blog/category', [PostController::class, 'storeblogcategory'])->name('admin.store.blog.category');
Route::get('/admin/delete/blog/category/{id}', [PostController::class, 'deleteblogcategory'])->name('admin.delete.blog.category');
Route::get('/admin/edit/blog/category/{id}', [PostController::class, 'editblogcategory'])->name('admin.edit.blog.category');
Route::post('/admin/update/blog/category/{id}', [PostController::class, 'updateblogcategory'])->name('admin.update.blog.category');

// <-++++++++++++++++++++ ADMIN BLOG POST ROUTE LIST +++++++++++++++++++++++++->
Route::get('/admin/blog/post', [PostController::class, 'blogpost'])->name('admin.all.blog.post');
Route::get('/admin/create/blog/post', [PostController::class, 'blogpostcreate'])->name('admin.create.blog.post');
Route::post('/admin/store/blog/post', [PostController::class, 'storeblogpost'])->name('admin.store.blog.post');
Route::get('/admin/delete/blog/post/{id}', [PostController::class, 'deleteblogpost'])->name('admin.delete.blog.post');
Route::get('/admin/edit/blog/post/{id}', [PostController::class, 'editblogpost'])->name('admin.edit.blog.post');
Route::post('/admin/update/blog/post/{id}', [PostController::class, 'updateblogpost'])->name('admin.update.blog.post');


// <-++++++++++++++++++++ ADMIN ORDER ROUTE LIST +++++++++++++++++++++++++->
// ORDER SHOW ROUTE
Route::get('/admin/panding/order', [App\Http\Controllers\Admin\OrderController::class, 'newOrder'])->name('admin.order.new');
Route::get('/admin/order/accept', [App\Http\Controllers\Admin\OrderController::class, 'orderAccepted'])->name('admin.order.accept.list');
Route::get('/admin/order/process', [App\Http\Controllers\Admin\OrderController::class, 'orderProcess'])->name('admin.order.process.list');
Route::get('/admin/order/delivery', [App\Http\Controllers\Admin\OrderController::class, 'orderDelivery'])->name('admin.order.delivery.list');
Route::get('/admin/order/cancel', [App\Http\Controllers\Admin\OrderController::class, 'orderCancelAll'])->name('admin.order.cancel.list');

Route::get('/admin/order/view/{id}', [App\Http\Controllers\Admin\OrderController::class, 'viewOrder'])->name('admin.order.view');

// ORDER STATUS UPDATE ROUTE
Route::get('/admin/order/accepted/{id}', [App\Http\Controllers\Admin\OrderController::class, 'paymentAccepted'])->name('admin.payment.accepted');
Route::get('/admin/order/process/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderProcessUpdate'])->name('admin.order.process');
Route::get('/admin/order/delivery/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderDeliveryUpdate'])->name('admin.order.delivery');
Route::get('/admin/order/cancelled/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderCancelled'])->name('admin.order.cancelled');
Route::get('/admin/order/delete/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderDelete'])->name('admin.order.delete');

// SEO ROUTE LIST
Route::get('/admin/seo', [AdminController::class, 'seo'])->name('admin.seo');
Route::post('/admin/seo', [AdminController::class, 'seoUpdate'])->name('admin.seo.update');

// REPORTS ROUTE LIST
Route::get('/admin/today/order', [ReportController::class, 'todayOrder'])->name('admin.today.order');
Route::get('/admin/today/delivery', [ReportController::class, 'todayDelivery'])->name('admin.today.delivery');
Route::get('/admin/this/month', [ReportController::class, 'thisMonth'])->name('admin.this.month');
Route::get('/admin/search/report', [ReportController::class, 'searchReport'])->name('admin.serach.report');
// REPORT SEARCH ROUTE
Route::post('/admin/search/by/date', [ReportController::class, 'serachByDate'])->name('admin.search.by.date');
Route::post('/admin/search/by/month', [ReportController::class, 'serachByMonth'])->name('admin.search.by.month');
Route::post('/admin/search/by/year', [ReportController::class, 'serachByYear'])->name('admin.search.by.year');

//RETURN ORDER ROUTE LIST
Route::get('/admin/return/order', [ReturnController::class, 'returnOrder'])->name('admin.return.request');
Route::get('/admin/return/order/update/{id}', [ReturnController::class, 'returnOrderUpdate'])->name('admin.product.return.update');
Route::get('/admin/return/all', [ReturnController::class, 'returnAll'])->name('admin.all.return.request');


// PRODUCT STOCK ROUTE LIST
Route::get('/admin/product/stock', [UserRoleController::class, 'productStock'])->name('admin.product.stock');
// CONTACT MESSAGE ROUTE LIST
Route::get('/admin/contact/message', [AdminController::class, 'contactMessage'])->name('admin.all.message');
Route::get('/admin/contact/show/{id}', [AdminController::class, 'showMessage'])->name('admin.show.message');
