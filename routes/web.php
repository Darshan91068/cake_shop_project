<?php

use Illuminate\View\View;
use App\Http\Controllers\admin\usershowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\usercontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\ValidUser;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\manage_ContactController;
use App\Http\Controllers\admin\manage_productController;
use App\Http\Controllers\frontend\cartController;
use App\Http\Controllers\frontend\checkoutController;
use App\Http\Controllers\frontend\contactController;
use App\Http\Controllers\frontend\fetch_productController;
use App\Http\Controllers\frontend\invoiceController;
use App\Http\Controllers\frontend\orderController;
use App\Http\Controllers\frontend\productDetailController;
use App\Http\Controllers\frontend\showCartProductController;
use App\Http\Middleware\CartRedirectIfNotAuthenticated;
use App\Http\Controllers\admin\orderController as AdminOrderShow;
// C:\xammp82\htdocs\laravel_cake_shop\app\Http\Controllers\admin\orderController.php

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about_us');

Route::get('/protfolio', function () {
    return view('frontend.protfolio');
})->name('protfolio');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact_us');

Route::get('/shop', function () {
    return view('frontend.shop');
})->name('shop');

Route::get('/registration', function () {
    return view('frontend.register');
})->name('registration');

// Route::get('/our_cake', function () {
//     return view('frontend.our_cakes');
// })->name('our_cake');

// Route::get('/cart', function () {
//     return view('frontend.cart');
// })->name('cart');


Route::get('/product_detail', function () {
    return view('frontend.product_detail');
})->name('product_detail');




Route::fallback(function () {
    return view('frontend.404page');
});


Route::post('/register', [usercontroller::class, 'store'])->name('register.store');

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Fetch Product Route
Route::get('/', [fetch_productController::class, 'index'])->name('home');
Route::get('/product-detail/{id}', [productDetailController::class, 'show'])->name('product_detail');
// Route::get('/product_detail', [fetch_productController::class, 'index'])->name('product_detail');
Route::get('/our_cake', [fetch_productController::class, 'fetch_our_cakes'])->name('our_cake');
Route::get('/chekout', function () {
    return view('frontend.chekout');
});
Route::post('/contact', [contactController::class, 'submitForm'])->name('contact.submit');
//Cart Route
Route::post('/add-to-cart', [cartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart/count', [cartController::class, 'cartCount'])->name('cart.count');
Route::post('/cart/add', [cartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::middleware(CartRedirectIfNotAuthenticated::class)->group(function () {
    Route::get('/cart', [showCartProductController::class, 'index'])->name('cart');
    Route::delete('/cart/remove/{id}', [showCartProductController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout', [checkoutController::class, 'processCheckout'])->name('checkout');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    // Route::get('/invoice', function () {
    //     return view('frontend.invoice');
    // });
    Route::get('/invoice', [invoiceController::class, 'show'])->name('invoice');

    // Route::delete('/cart/{id}', [showCartProductController::class, 'remove'])->name('cart.remove');
});


//  dashboard with authentication middleware
Route::get('admin/login', [AdminController::class, 'showAdminForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Apply the middleware directly to routes
Route::middleware(ValidUser::class)->group(function () {

    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.index');
    Route::post('admin/logout', [AdminController::class, 'adminlogout'])->name('admin.logout');

    // users
    Route::get('/admin/user-details', [usershowController::class, 'user_list'])->name('admin.user_details');
    Route::delete('/admin/user/{id}', [usershowController::class, 'destroy'])->name('users.destroy');

    // category
    Route::get('/admin/manage_category', [categoryController::class, 'category_list'])->name('admin.manage_category');
    Route::post('/admin/add_category', [categoryController::class, 'store'])->name('admin.add_category');
    Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::get('admin/category/{id}', [CategoryController::class, 'show']);
    Route::put('admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::put('/admin/update_category/{id}', [CategoryController::class, 'update'])->name('admin.update_category');

    // product
    Route::get('/admin/manage_product', [manage_productController::class, 'product_list'])->name('admin.manage_product');
    Route::post('/admin/add_product', [manage_productController::class, 'store'])->name('admin.add_product');
    Route::get('/admin/products', [manage_productController::class, 'showProducts'])->name('admin.products');
    Route::get('/admin/products/{encodedId}', [manage_productController::class, 'showUpdateProductForm']);
    Route::put('/admin/updateproduct/{updateproductid}', [manage_productController::class, 'update']);
    Route::delete('/admin/productdelete/{id}', [manage_productController::class, 'destroy']);

    // contact
    Route::get('/admin/manage_contact', [manage_ContactController::class, 'contact_list'])->name('admin.manage_contact');
    Route::delete('/admin/contact/{delete_id}', [manage_ContactController::class, 'destroy'])->name('admin.contact.delete');
    Route::get('/admin/order', [AdminOrderShow::class, 'product_list'])->name('admin.order');
    Route::get('/admin/order-show', [AdminOrderShow::class, 'order_list'])->name('admin.order-show');

});
