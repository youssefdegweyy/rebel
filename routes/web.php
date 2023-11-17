<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ContactMessageController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\WebController;
use App\Mail\OrderConfirmationMail;
use App\Models\City;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [WebController::class, 'home'])->name('home');

Route::get('/test-mail', function () {
    $email = "hishamkisho1@gmail.com";
    $name = "Hisham";
    $order = "Order";
    if ($mail = Mail::to($email)->send(new OrderConfirmationMail($name, $order))) return "ok";
    else return $mail;
});

//Route::get('home', [WebController::class, 'home'])->name('home');
Route::get('contact-us', [WebController::class, 'contact'])->name('contact');
Route::post('contact-us', [WebController::class, 'store_contact'])->name('store-contact');
Route::get('products', [WebController::class, 'products'])->name('products');
Route::get('products/{id}', [WebController::class, 'single_product']);
Route::post('products/{id}', [WebController::class, 'add_to_cart'])->name('add_to_cart')->middleware('auth');
Route::get('signup', [AuthController::class, 'signup_page'])->name('signup')->middleware('guest');
Route::get('login', [AuthController::class, 'login_page'])->name('web-login')->middleware('guest');
Route::post('signup', [AuthController::class, 'register'])->name('register');
Route::post('web-login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('cart', [WebController::class, 'user_cart'])->name('cart')->middleware('auth');
Route::post('remove-cart-product/{id}', [WebController::class, 'remove_product_from_cart'])->name('remove-item-from-cart')->middleware('auth');
Route::post('change-cart-product-quantity/{id}', [WebController::class, 'change_quantity'])->name('change-quantity')->middleware('auth');
Route::get('checkout', [WebController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('checkout', [WebController::class, 'make_order'])->name('make-order')->middleware('auth');

Route::get('orders', [WebController::class, 'orders'])->name('web-orders');
Route::get('orders/{id}', [WebController::class, 'single_order'])->name('web-orders-single');

Route::get('get-price', function () {
    $city = request('city');
    $price = City::findOrFail($city);
    return $price->price;
});

Route::group(['prefix' => 'admin'], function () {
    Route::middleware('auth')->group(function () {
        Route::middleware('admin')->group(function () {
            Route::get('/dashboard', function () {
                $sold_orders = Order::where('status', Order::DELIVERED)->count();
                $pending_orders = Order::where('status', Order::PENDING)->count();
                $cancelled_orders = Order::where('status', Order::CANCELLED)->count();
                $confirmed_orders = Order::where('status', Order::CONFIRMED)->count();
                $progress_orders = Order::where('status', Order::PROGRESS)->count();
                $total_users = User::where('role', 1)->count();
                return view('dashboard', compact('sold_orders', 'total_users', 'pending_orders', 'cancelled_orders', 'confirmed_orders', 'progress_orders'));
            });
            Route::resource('users', UserController::class)->only('index', 'edit', 'update', 'destroy');
            Route::resource('contact-messages', ContactMessageController::class)->only('index', 'destroy');
            Route::resource('categories', CategoryController::class)->except('show');
            Route::resource('cities', CityController::class)->except('show');
            Route::resource('products', ProductController::class)->names('admin-products')->except('show');
            Route::delete('delete-gallery-item', [ProductController::class, 'delete_gallery_item'])->name('delete_item');

            Route::resource('orders', OrderController::class)->only('index', 'edit', 'update');
//            Route::post('order-delivered/{id}', [OrderController::class, 'mark_delivered'])->name('mark_order_delivered');
            Route::post('order-cancelled/{id}', [OrderController::class, 'mark_cancelled'])->name('mark_order_cancelled');
            Route::get('delivered-orders', [OrderController::class, 'delivered_orders']);
            Route::get('cancelled-orders', [OrderController::class, 'cancelled_orders']);

        });
    });
});

require __DIR__ . '/auth.php';
