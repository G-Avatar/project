<?php

use App\Http\Controllers\Administrator\AreaController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\InstituteController;
use App\Http\Controllers\Administrator\OfficeController;
use App\Http\Controllers\Administrator\ProcessController;
use App\Http\Controllers\Administrator\ProgramController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/',[AuthController::class,'loginPage'])->name('login-page');
    Route::post('login',[AuthController::class,'login'])->name('login');
});

Route::middleware(['auth'])->group(function(){
    // Admin routes
    Route::prefix('administrator')->group(function(){
        Route::get('/',function(){
            return redirect()->route('admin-dashboard-page');
        });
        Route::get('/dashboard',[DashboardController::class,'adminDashboardPage'])->name('admin-dashboard-page');
        Route::get('/area',[AreaController::class,'adminAreaPage'])->name('admin-area-page');
        Route::post('/add-institute',[InstituteController::class,'addInstitute'])->name('add-institute');
        Route::post('/add-program',[ProgramController::class,'addProgram'])->name('add-program');
        Route::post('/add-process',[ProcessController::class,'addProcess'])->name('add-process');
        Route::post('/add-office',[OfficeController::class,'addOffice'])->name('add-office');
    });

    Route::get('logout',[AuthController::class,'lg'])->name('logout');
    
});
