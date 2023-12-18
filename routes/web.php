<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LoginController;
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

Route::middleware('set_locale')->group(function(){
    Route::get('/', function () {
        return redirect()->route('login.index');
    });
    
        Route::get('/locale/{lang}',[LocaleController::class,'changeLocale'])->name('locale');
    
    
        Route::middleware('guest')->group(function(){
            Route::get('login',[LoginController::class,'index'])->name('login.index');
            Route::post('login',[LoginController::class,'store'])->name('login.store');
        
        });
        Route::name('admin.')->middleware('auth')->prefix('admin')->group(function(){
            Route::controller(CompanyController::class)->group(function(){
                Route::get('home','index')->name('home');
                Route::get('home/company/create','create')->name('company.create');
                Route::post('home','store')->name('company.store');
                Route::get('home/company/{id}/edit','edit')->name('company.edit');
                Route::put('home/company/{id}/edit','update')->name('company.update');
                Route::delete('home/{id}/delete','destroy')->name('company.destroy');
        
            });
        
            Route::controller(EmployeeController::class)->group(function(){
                Route::get('home/employees','index')->name('home.employee');
                Route::get('home/employees/create','create')->name('employee.create');
                Route::post('home/employees','store')->name('employee.store');
                Route::get('home/employees/{id}/edit','edit')->name('employee.edit');
                Route::put('home/employees/{id}/edit','update')->name('employee.update');
                Route::delete('home/employees/{id}/delete','destroy')->name('employee.destroy');
    
            });

            Route::view('table-users','admin.tables')->name('table.users');
            Route::get('/get-data', [DataController::class, 'getData'])->name('get-data.users');

        });
        
    
});
