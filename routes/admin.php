<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Controllers\NationController;



Route::get('/admin', function () {
   return view('admin.login');
});
Auth::routes();

Route::middleware([Admin::class])->group(function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');
    Route::get('get-all-row',[NationController::class,'get_table_data'])->name('get-all-row');
    Route::resource('nations',NationController::class);
});

