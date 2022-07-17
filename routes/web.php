<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\InvoicesDetailsController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

 


Auth::routes([

    'register' => false, // Register Routes...
  
    'reset' => false, // Reset Password Routes...
  
    'verify' => false, // Email Verification Routes...
  
  ]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('invoices', 'App\Http\Controllers\InvoicesController');
 Route::get('/section/{id}', [InvoicesController::class,'getProducts']);
 Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class,'edit']);
 Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'open_file']);
 Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'get_file']);
 Route::post('delete_file', [InvoicesDetailsController::class,'destroy']);





Route::resource('sections', 'App\Http\Controllers\SectionsController');


Route::resource('products', 'App\Http\Controllers\ProductController');












Route::get('/{page}', [AdminController::class, 'index']);

