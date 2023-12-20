<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
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
    return view('dashboard');
})->middleware('auth');

Auth::routes();
 Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
 Route::get('/department-list', [DepartmentController::class, 'index'])->name('departments.list');
Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeManagementController::class, 'index'])->name('employees.list');
    Route::get('/create', [EmployeeManagementController::class, 'create'])->name('employees.create');
    Route::post('/store', [EmployeeManagementController::class, 'store'])->name('employees.store');
    Route::get('/delete/{id}', [EmployeeManagementController::class, 'delete'])->name('employees.delete');
    Route::get('/edit/{id}', [EmployeeManagementController::class, 'edit'])->name('employees.edit');
    Route::post('/update/{id}', [EmployeeManagementController::class, 'update'])->name('employees.update');
});
