<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Department
Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('create_department');
Route::post('/department/save', [DepartmentController::class, 'store'])->name('save_department');
Route::get('/department/show/{departmentId}', [DepartmentController::class, 'show'])->name('show_department');
Route::get('/department/edit/{departmentId}', [DepartmentController::class, 'edit'])->name('edit_department');
Route::put('/department/update/{departmentId}', [DepartmentController::class, 'update'])->name('update_department');
Route::delete('/department/delete/{departmentId}', [DepartmentController::class, 'destory'])->name('delete_department');

