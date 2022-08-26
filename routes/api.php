<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
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
    return $request->user();
});


Route::prefix('/website')->name('website.')->group(function(){
    Route::get('/', [WebsiteController::class, 'index'])->name('index');
    Route::post('/' , [WebsiteController::class, 'store'])->name('store');
});

Route::prefix('/subscribe')->name('subscribe.')->group(function(){
    Route::post('/', [SubscriptionController::class, 'store'])->name('store');
    Route::delete('/', [SubscriptionController::class, 'destroy'])->name('destroy');
});


Route::prefix('/post')->name('post.')->group(function(){
    Route::post('/', [PostController::class, 'store'])->name('store');
});

