<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

        Route::get('logout', [AuthController::class, 'logout']);
    });
});
