<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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




 Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);


Route::resource('sections', 'App\Http\Controllers\SectionsController');


Route::resource('products', 'App\Http\Controllers\ProductController');
Route::resource('InvoiceAttachments', 'App\Http\Controllers\InvoicesAttachmentsController');
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class,'edit']);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'open_file']);
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'get_file']);
Route::post('delete_file', [InvoicesDetailsController::class,'destroy']);
Route::get('/Status_show/{id}',[InvoicesController::class,'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');
Route::resource('Archive', 'App\Http\Controllers\AchiveController');

Route::get('Invoice_Paid', [InvoicesController::class,'Invoice_Paid']);

Route::get('Invoice_UnPaid', [InvoicesController::class,'Invoice_UnPaid']);

Route::get('Invoice_Partial', [InvoicesController::class,'Invoice_Partial']);

Route::get('Print_invoice/{id}',[InvoicesController::class,'Print_invoice']);
Route::get('export_invoices',[InvoicesController::class,'export']);

Route::group(['middleware' => ['auth']], function() {
  Route::resource('roles', RoleController::class);
  Route::resource('users', UserController::class);
});















Route::get('/{page}', [AdminController::class, 'index']);

