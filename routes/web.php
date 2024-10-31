<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SelectMenuController;
use App\Http\Controllers\FetchBlogsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    // Other admin routes here
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users.create');
    Route::get('/orders', [AdminController::class, 'manageOrders'])->name('admin.orders');
    Route::get('/about', [AdminController::class, 'manageAbout'])->name('admin.about');
    Route::get('/userProfiles', [AdminController::class, 'manageUserProfiles'])->name('admin.userProfiles');
    Route::get('/foodMenu', [AdminController::class, 'manageFoodMenu'])->name('admin.foodMenu');
    Route::get('/payment', [AdminController::class, 'managePayment'])->name('admin.payment');
    Route::get('/subscription', [AdminController::class, 'manageSubscription'])->name('admin.subscription');
    Route::get('/suggestions', [AdminController::class, 'manageSuggestions'])->name('admin.suggestions');

    //fetch the contact_messages route in admin dashboard
    Route::get('/contact-messages', [ContactController::class, 'Viewcontact_us_messages'])->name('admin.contact-messages.contact');

    //menu management routes
    Route::get('/menu', [MenuController::class, 'index'])->name('admin.menu');
    Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/admin/menu', [MenuController::class, 'store'])->name('admin.menu.store');
    Route::get('/admin/menu/{menu}/edit', [MenuController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/admin/menu/{menu}', [MenuController::class, 'update'])->name('admin.menu.update');
    Route::delete('/admin/menu/{menu}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');

    //Menu category management
    Route::get('/category/index', [MenuCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [MenuCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [MenuCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/{category}/edit', [MenuCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::delete('/category/{category}', [MenuCategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::put('/category/{category}', [MenuCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/categories{category}', [MenuController::class, 'showCategories'])->name('categories');

    //Admin Blogs Management Routes
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
});



//logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


//Route to Open the welcome page
Route::get('/', [WelcomeController::class, 'showMenu'])->name('welcomeWithMenu');
Route::post('/categoryName', [WelcomeController::class, 'fetchMenuItems'])->name('welcomeForCategory');


//Route to Open the menu page
Route::get('/menu', [SelectMenuController::class, 'showMenu'])->name('menu');
Route::post('/categoryName', [SelectMenuController::class, 'fetchMenuItems'])->name('selectCategory');
//add to cart route
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/order/confirm', function () {
    return view('order');
})->name('order');

//Payment Routes
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

//Save order
Route::post('/order/save', [OrderController::class, 'saveOrder'])->name('order.save');
Route::get('/invoice/{order_id}', [OrderController::class, 'generateInvoice'])->name('invoice.download');

//Blog Routes
Route::get('/blog', [FetchBlogsController::class, 'fechBlogs'])->name('blog'); //all blogs
Route::get('/singleBlog/{id}', [FetchBlogsController::class, 'readBlog'])->name('singleBlog');

// Contact Route
Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'submitForm']);
