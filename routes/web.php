<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\CommissionController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::resource('affiliates', AffiliateController::class);
Route::resource('commissions', CommissionController::class);