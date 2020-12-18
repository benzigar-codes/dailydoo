<?php

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

Route::view("/","welcome")->name("login");
Route::view("/home","home")->name("home")->middleware("auth");
Route::get("/logout","AuthController@logout")->name("logout");