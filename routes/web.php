<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\CommissionController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::post('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
Route::resource('affiliates', AffiliateController::class);
Route::post('affiliates/{affiliate}/activate', [AffiliateController::class, 'activate'])->name('affiliates.activate');
Route::resource('commissions', CommissionController::class);