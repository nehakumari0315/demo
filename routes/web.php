<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LinkedinController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\EmployeeListController;



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

Route::get('/', function (){
    return view('welcome');
});

Auth::routes();

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/linkedin', [LinkedinController::class, 'redirectToLinkedin']);
Route::get('linkedin/callback', [LinkedinController::class, 'handleCallback']);

Route::group(['prefix' => 'admin','middleware' => ['auth','IsAdmin']],function(){
    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('logout',[DashboardController::class,'logout']);
    Route::get('department', [DepartmentController::class, 'index']);
    Route::post('create',[DepartmentController::class,'store'])->name('department.create');
    Route::get('destory/{id}',[DepartmentController::class,'delDelete'])->name('department.destory');
    Route::get('editDepartment/{id}', [DepartmentController::class, 'edit']);
    Route::post('update/{id?}', [DepartmentController::class, 'update'])->name('department.update');

// Employee-list-start
    Route::get('employee',[EmployeeListController::class,'index']);
    Route::get('get_designation',[EmployeeListController::class,'subCat'])->name('get_designation.data');

// Employee-list-end

});













