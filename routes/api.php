<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = User::find(Auth::id());
    return response([
        'name' => $user->name,
        'email' => $user->email,
        'cart' => count($user->products)
    ]); 
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/carts', [CartController::class, 'getAllCart'])->middleware(['auth:sanctum']);
Route::get('/cart-notification', [CartController::class, 'cartNotification'])->middleware(['auth:sanctum']);
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->middleware(['auth:sanctum']);
Route::post('/delete-cart-item', [CartController::class, 'deleteCart'])->middleware(['auth:sanctum']);

Route::resource('/products', ProductController::class);
Route::resource('/blogs', BlogController::class);