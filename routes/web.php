<?php

use App\Models\Role;
use App\Models\Employee;
use App\Http\Controllers\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\TransactionController;
use SebastianBergmann\Comparator\TypeComparator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

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

Route::get('/', function () {
    return view('index');
})->middleware('cheking');

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('cheking');
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::middleware('onlyadmin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('employee', [EmployeeController::class, 'index']);
        Route::post('employee', [EmployeeController::class, 'store']);
        Route::post('employee/{id}', [EmployeeController::class, 'update']);
        Route::get('delete-employee/{id}', [EmployeeController::class, 'delete']);

        Route::get('users', [UserController::class, 'index']);
        Route::post('users/{id}', [UserController::class, 'store']);
        Route::post('update-users/{id}', [UserController::class, 'update']);
        Route::get('delete-users/{id}', [UserController::class, 'delete']);

        Route::get('role', [RoleController::class, 'index']);
        Route::post('role', [RoleController::class, 'store']);
        Route::post('role/{id}', [RoleController::class, 'update']);
        Route::get('role/{id}', [RoleController::class, 'delete']);

        Route::get('profession', [ProfessionController::class, 'index']);
        Route::post('profession', [ProfessionController::class, 'store']);
        Route::post('profession/{id}', [ProfessionController::class, 'update']);
        Route::get('profession/{id}', [ProfessionController::class, 'delete']);

        Route::get('type', [TypeController::class, 'index']);
        Route::post('type', [TypeController::class, 'store']);
        Route::post('type/{id}', [TypeController::class, 'update']);
        Route::get('type/{id}', [TypeController::class, 'delete']);

        Route::get('category', [CategoryController::class, 'index']);
        Route::post('category', [CategoryController::class, 'store']);
        Route::post('category/{id}', [CategoryController::class, 'update']);
        Route::get('category/{id}', [CategoryController::class, 'delete']);

        Route::get('products', [ProductController::class, 'index']);
        Route::post('products', [ProductController::class, 'store']);
        Route::get('products/{id}', [ProductController::class, 'show']);
        Route::post('products/{id}', [ProductController::class, 'update']);
        Route::get('delete-products/{id}', [ProductController::class, 'delete']);

        Route::get('scan', [ScanController::class, 'index']);
        Route::post('scanqr', [ScanController::class, 'scanqr']);

        Route::get('supplier', [SupplierController::class, 'index']);
        Route::post('supplier', [SupplierController::class, 'store']);
        Route::post('supplier/{id}', [SupplierController::class, 'update']);
        Route::get('supplier/{id}', [SupplierController::class, 'delete']);

        Route::get('customer', [CustomerController::class, 'index']);
        Route::post('customer', [CustomerController::class, 'store']);
        Route::post('customer/{id}', [CustomerController::class, 'update']);
        Route::get('customer/{id}', [CustomerController::class, 'delete']);

        Route::get('discount', [DiscountController::class, 'index']);
        Route::post('discount', [DiscountController::class, 'store']);
        Route::post('discount/{id}', [DiscountController::class, 'update']);
        Route::get('discount/{id}', [DiscountController::class, 'delete']);

        Route::get('cart', [CartController::class, 'index']);
        Route::get('addcart/{id}', [CartController::class, 'addcart']);
        Route::get('deletecart/{id}', [CartController::class, 'deletecart']);
        Route::post('storecart', [CartController::class, 'store']);

        Route::get('orders', [TransactionController::class, 'index']);
        Route::get('order-details/{id}', [TransactionController::class, 'detailOrders']);

        Route::get('logout', [AuthController::class, 'logout']);
    });
});
