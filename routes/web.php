<?php

use App\Http\Controllers\Administrator\AreaController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\InstituteController;
use App\Http\Controllers\Administrator\OfficeController;
use App\Http\Controllers\Administrator\ProcessController;
use App\Http\Controllers\Administrator\ProgramController;
use App\Http\Controllers\Administrator\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DCC\DCCDashboardController;
use App\Http\Controllers\DCC\TemplateController;
use App\Http\Controllers\OfficeUserController;
use App\Http\Controllers\ProcessUserController;
use App\Http\Controllers\ProgramUserController;
use App\Http\Controllers\UserController;
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
    Route::prefix('administrator')->middleware('admin')->group(function(){
        Route::get('/',function(){
            return redirect()->route('admin-dashboard-page');
        });
        Route::get('/dashboard',[DashboardController::class,'adminDashboardPage'])->name('admin-dashboard-page');
        Route::get('/area',[AreaController::class,'adminAreaPage'])->name('admin-area-page');
        Route::post('/add-institute',[InstituteController::class,'addInstitute'])->name('add-institute');
        Route::put('/edit-institute',[InstituteController::class,'editInstitute'])->name('edit-institute');
        Route::post('/add-program',[ProgramController::class,'addProgram'])->name('add-program');
        Route::put('/edit-program',[ProgramController::class,'editProgram'])->name('edit-program');
        Route::post('/add-process',[ProcessController::class,'addProcess'])->name('add-process');
        Route::put('/edit-process',[ProcessController::class,'editProcess'])->name('edit-process');
        Route::post('/add-office',[OfficeController::class,'addOffice'])->name('add-office');
        Route::put('/edit-office',[OfficeController::class,'editOffice'])->name('edit-office');
        Route::get('/pending-users',[UserController::class,'pending'])->name('admin-pending-users-page');
        Route::get('/rejected-users',[UserController::class,'rejected'])->name('admin-rejected-users-page');
        Route::get('/list-dcc-po',[UserController::class,'listDccPo'])->name('list-dcc-po');
        Route::put('/approve-user',[UserController::class,'approve'])->name('admin-approve-user');
        Route::post('/add-program-user',[ProgramUserController::class,'addProgramUser'])->name('add-program-user');
        Route::post('/add-office-user',[OfficeUserController::class,'addOfficeUser'])->name('add-office-user');
        Route::post('/add-process-user',[ProcessUserController::class,'addProcessUser'])->name('add-process-user');
        Route::prefix('roles')->group(function(){
            Route::get('/',[RoleController::class,'index'])->name('admin-role-page');
            Route::get('{id}',[RoleController::class,'show'])->name('admin-user-list');
        });
    });

    Route::prefix('dcc')->middleware('dcc')->group(function(){
        Route::get('/',function(){
            return redirect()->route('dcc-dashboard-page');
        });
        Route::get('/dashboard',[DCCDashboardController::class,'dashboard'])->name('dcc-dashboard-page');
        Route::get('/template',[TemplateController::class,'index'])->name('dcc-template-page');
    });

    Route::get('logout',[AuthController::class,'lg'])->name('logout');
    
});

Route::resources([
    'users'=>UserController::class
]);
