<?php

use App\Http\Controllers\Admin\InvoicesController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/index',  [AdminController::class, 'index'])->name('dashboard.index');
    Route::resource('admin/invoices' , InvoicesController::class);
});
