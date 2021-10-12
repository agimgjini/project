<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InfoController;


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
    return view('home');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::post('/newCustomer',[CustomersController::class, 'newCustomer'])->name('newCustomer');
    Route::get('/newCustomer',[CustomersController::class, 'newCustomer'])->name('newCustomer');
    Route::get('/home', [CustomersController::class, 'index']);
    Route::get('/getCustomers',[CustomersController::class, 'getCustomers'])->name('getCustomers');
    Route::get('/deleteCustomer/{customers}',[CustomersController::class, 'deleteCustomer'])->name('deleteCustomer');
    Route::post('/customer/{customers}',[CustomersController::class, 'editcustomers'])->name('editcustomers');
    Route::get('/customer/{customers}',[CustomersController::class, 'editcustomers'])->name('editcustomers');
    Route::get('/customer_info/{customer_info}', [InfoController::class, 'index'])->name('customer_info');
    Route::get('/getInfo',[InfoController::class, 'getInfo'])->name('getInfo');
    Route::post('/newinfo/{customer_id?}',[InfoController::class, 'newinfo'])->name('newinfo');
    Route::get('/newinfo/{customer_id?}',[InfoController::class, 'newinfo'])->name('newinfo');
    Route::post('/customer/{customer_info?}', [InfoController::class, 'editinfo'])->name('editinfo');
    Route::get('/customer/{customer_info?}', [InfoController::class, 'editinfo'])->name('editinfo');
    Route::get('/file_uplaod', [App\Http\Controllers\FileUploadController::class, 'fileUpload'])->name('file.upload');
    Route::post('/file_uplaod', [App\Http\Controllers\FileUploadController::class, 'fileUploadPost'])->name('file.upload.post');
    Route::get('users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::post('users', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
    Route::get('deleteUser\{users}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
