<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;


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
Route::get('/sections', [SectionsController::class, 'index'])->name('sections');
Route::post('/sections/store', [SectionsController::class, 'store'])->name('sections.store');
Route::resource('/sections/update', [SectionsController::class, 'store']);
Route::post('/sections/delete', [SectionsController::class, 'store'])->name('sections.delete');






Route::get('/{page}', [AdminController::class, 'index']);

