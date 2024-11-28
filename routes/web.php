<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('users/create',[UserController::class,'store']);
