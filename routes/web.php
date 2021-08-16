<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleInvoiceController;
use App\Http\Controllers\DashboardController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('post',[CustomerController::class,'index'])->name('customer_index');

Route::post('post',[CustomerController::class,'create'])->name('customer_post');

Route::get('product',[ProductController::class,'index'])->name('product_index');
Route::get('product_form',[ProductController::class,'create'])->name('product_form');
Route::post('product_post',[ProductController::class,'store'])->name('product_post');
//Route::get('invoice',[SaleInvoiceController::class,'index'])->name('sale_index');
//Route::get('invoice_form',[SaleInvoiceController::class,'create'])->name('sale_form');
Route::post('invoice_post',[SaleInvoiceController::class,'store'])->name('invoice_post');
Route::get('invoice/print/{id}',[SaleInvoiceController::class,'create'])->name('sales_Invoice');

Route::get('product_form/edit/{id}',[ProductController::class,'edit'])->name('post_edit');
Route::put('product_form/edit/{id}',[ProductController::class,'update'])->name('product_update');


Route::get('customer/edit/{id}',[CustomerController::class,'edit'])->name('customer_edit');
Route::put('customer/edit/{id}',[CustomerController::class,'update'])->name('customer_update');
Route::get('customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer_destroy');

Route::get('dashboard',[DashboardController::class,
    'showPost'])->name('dashboard');
