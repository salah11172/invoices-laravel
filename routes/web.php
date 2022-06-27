<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\BlogController;




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
Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices');

//secions routes
Route::get('sections', [SectionsController::class,'index']);
Route::post('/sections/store',   [SectionsController::class,   'store'])->name('sections.store');
Route::post('/sections/update',  [SectionsController::class,  'update'])->name('sections.update');
Route::post('/sections/destroy', [SectionsController::class, 'destroy'])->name('sections.destroy');;
//end secions routes

Route::resource('products', 'App\Http\Controllers\ProductController');












Route::get('/{page}', [AdminController::class, 'index']);

