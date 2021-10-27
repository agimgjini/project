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
    Route::get('/home', [CustomersController::class, 'index'])->name('home');
    Route::get('/getCustomers',[CustomersController::class, 'getCustomers'])->name('getCustomers');
    Route::get('/deleteCustomer/{customers}',[CustomersController::class, 'deleteCustomer'])->name('deleteCustomer');
    Route::post('/customer/{customers}',[CustomersController::class, 'editcustomers'])->name('editcustomers');
    Route::get('/customer/{customers}',[CustomersController::class, 'editcustomers'])->name('editcustomers');
    Route::get('/customer_info/{customer_id?}', [InfoController::class, 'index'])->name('customer_info');
    Route::get('/getInfo',[InfoController::class, 'getInfo'])->name('getInfo');
    Route::post('/newinfo/{customer_id?}',[InfoController::class, 'newinfo'])->name('newinfo');
    Route::get('/newinfo/{customer_id?}',[InfoController::class, 'newinfo'])->name('newinfo');
    Route::post('/editinfo/{customer_info?}', [InfoController::class, 'editinfo'])->name('editinfo');
    Route::get('/editinfo/{customer_info?}', [InfoController::class, 'editinfo'])->name('editinfo');
    Route::get('/deleteInfo/{customer_info}',[InfoController::class, 'deleteInfo'])->name('deleteInfo');
    Route::get('users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::post('users', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
    Route::get('deleteUser\{users}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
    Route::resource('products', 'App\Http\Controllers\ProductController');
    Route::get('products', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
});

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
