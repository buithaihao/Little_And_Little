<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\myController;

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

// Hiển thị trang chủ của website
Route::get('/home', [myController::class, 'showHome']);
// Chức năng thêm khách hàng của website
Route::post('/home', [myController::class, 'Home']);

// Hiển thị trang thanh toán của website
Route::get('/payment', [myController::class, 'showPayment']);
// Chức năng thanh toán vé của website
Route::post('/payment', [myController::class, 'Payment']);

// Hiển thị trang thanh toán thành công của website
Route::get('/success', [myController::class, 'showSuccess']);
// Chức năng tải về
Route::match(['get', 'post'], '/taive', [myController::class, 'Export']);
// Chức năng gửi email về
Route::match(['get', 'post'], '/guimail', [myController::class, 'Guiemail']);

// Hiển thị trang sự kiện của website
Route::get('/event', [myController::class, 'showEvent']);

// Hiển thị trang chi tiết sự kiện của website
Route::get('/eventdetails/{eventid}', [myController::class, 'showEventDetails']);

// Hiển thị trang liên hệ của website
Route::get('/contact', [myController::class, 'showContact']);
// Chức năng gửi liên hệ của website
Route::post('/contact', [myController::class, 'Contact']);
