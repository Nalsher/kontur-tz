<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

Route::get('/',[ContactsController::class, "create"]);
Route::post('/',[ContactsController::class, "store"]);