<?php

use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Detail_Controller;
use App\Http\Controllers\Customer_Controller;
use App\Http\Controllers\Catalog_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Product_Controller;
use App\Http\Controllers\Type_Controller;
use App\Http\Controllers\Category_Controller;
use App\Http\Controllers\Rarity_Controller;
use App\Http\Controllers\Orders_Controller;
use App\Http\Controllers\Users_Controller;
use App\Http\Controllers\Cart_Controller;
use App\Http\Controllers\Invoice_Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home_panel.home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//======================================================================= PRODUCT ==================================================================
Route::middleware('seller')->group(function () {

    Route::get('/product', [Product_Controller::class, 'index'])->name('product');

    Route::post('/add_product', [Product_Controller::class, 'create'])->name('product.create');

    Route::get('/add_product', function () {

        echo view('admin_panel/product/add_product');

    });

    Route::get('/edit_product/{id}', [Product_Controller::class, 'edit'])->name('product.edit');
    Route::post('/edit_product/{id}', [Product_Controller::class, 'update'])->name('product.update');


    Route::delete('/product_delete/{id}', [Product_Controller::class, 'delete'])->name('product.delete');

    Route::get('/product_detail/{id}', [Product_Controller::class, 'displaydatabyid'])->name('product.detail');
});

//======================================================================= CATEGORY ==================================================================
Route::middleware('seller')->group(function () {
    Route::get('/category', [Category_Controller::class, 'display'])->name('category');

    Route::post('/add_category', [Category_Controller::class, 'create'])->name('category.create');

    Route::get('/add_category', function () {

        echo view('admin_panel/category/add_category');

    });

    Route::get('/edit_category/{id}', [Category_Controller::class, 'edit'])->name('category.edit');
    Route::post('/edit_category/{id}', [Category_Controller::class, 'update'])->name('category.update');

    Route::delete('/category_delete/{id}', [Category_Controller::class, 'delete'])->name('category.delete');
});

//======================================================================= RARITY ==================================================================
Route::middleware('seller')->group(function () {
    Route::get('/rarity', [Rarity_Controller::class, 'display'])->name('rarity');

    Route::post('/add_rarity', [Rarity_Controller::class, 'create'])->name('rarity.create');

    Route::get('/add_rarity', function () {

        echo view('admin_panel/rarity/add_rarity');

    });

    Route::get('/edit_rarity/{id}', [Rarity_Controller::class, 'edit'])->name('rarity.edit');
    Route::post('/edit_rarity/{id}', [Rarity_Controller::class, 'update'])->name('rarity.update');

    Route::delete('/rarity_delete/{id}', [Rarity_Controller::class, 'delete'])->name('rarity.delete');
});

//======================================================================= TYPE ==================================================================
Route::middleware('seller')->group(function () {
    Route::get('/type', [Type_Controller::class, 'display'])->name('type');

    Route::post('/add_type', [Type_Controller::class, 'create'])->name('type.create');

    Route::get('/add_type', function () {

        echo view('admin_panel/type/add_type');

    });

    Route::get('/edit_type/{id}', [Type_Controller::class, 'edit'])->name('type.edit');
    Route::post('/edit_type/{id}', [Type_Controller::class, 'update'])->name('type.update');

    Route::delete('/type_delete/{id}', [Type_Controller::class, 'delete'])->name('type.delete');
});

//======================================================================= ORDERS ==================================================================
Route::middleware('seller')->group(function () {
    Route::get('/orders', [Orders_Controller::class, 'display'])->name('orders');
    Route::get('/order_items', [Orders_Controller::class, 'orderitems'])->name('order_items');
    Route::get('/customer_address', [Orders_Controller::class, 'customeraddress'])->name('customer_address');
});

//======================================================================= USERS ==================================================================
Route::middleware('seller')->group(function () {
    Route::get('/users', [Users_Controller::class, 'display'])->name('users');


    Route::get('/edit_user/{id}', [Users_Controller::class, 'edit'])->name('users.edit');
    Route::post('/edit_user/{id}', [Users_Controller::class, 'update'])->name('users.update');

    Route::delete('/user_delete/{id}', [Users_Controller::class, 'delete'])->name('users.delete');
});


//======================================================================= HOME ==================================================================
Route::get('/home', [Home_Controller::class, 'display'])->name('home');

//======================================================================= DETAIL ==================================================================

Route::get('/detail/{id}', [Detail_Controller::class, 'displaydatabyid'])->name('detail');

//======================================================================= CATALOG ==================================================================

Route::get('/catalog/{categorySlug?}', [Catalog_Controller::class, 'Index'])->name('catalog');

//======================================================================= CART ==================================================================
Route::get('/cart', [Cart_Controller::class, 'cart'])->name('cart');
Route::post('/add-to-cart', [Cart_Controller::class, 'addToCart'])->name('cart.addToCart');
Route::post('/update-cart', [Cart_Controller::class, 'updateCart'])->name('cart.updateCart');
Route::post('/delete-item', [Cart_Controller::class, 'deleteItem'])->name('cart.deleteItem.cart');

//======================================================================= CHECKOUT ==================================================================
Route::get('/checkout', [Cart_Controller::class, 'checkout'])->name('checkout');
Route::post('/process-checkout', [Cart_Controller::class, 'processCheckout'])->name('processCheckout');
Route::get('/thank-you/{orderId}', [Cart_Controller::class, 'thankYou'])->name('thankYou');

//======================================================================= CUSTOMER ORDER HISTORY ==================================================================

Route::get('/customer', [Customer_Controller::class, 'display'])
    ->middleware('auth')
    ->name('customer');

//======================================================================= INVOICE ==================================================================

Route::get('/admin/invoices', [Invoice_Controller::class, 'index'])->name('admin.invoices.index');
Route::get('/admin/invoices/filter', [Invoice_Controller::class, 'filter'])->name('admin.invoices.filter');