<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Type;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use SebastianBergmann\Comparator\TypeComparator;

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
})->middleware('auth');

Route::get('login', [AuthController::class, 'index'])->name('login');
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

        Route::get('products', [ProductController::class, 'index']);

        Route::get('logout', [AuthController::class, 'logout']);
    });
});
