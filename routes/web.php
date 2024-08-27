<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/users', [UserController::class, 'index']);
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/addUser', [UserController::class, 'addUser']);
Route::post('/store-user', [UserController::class, 'store_user'])->name('store-user');
Route::get('/edit-user/{id}', [UserController::class, 'edit_user'])->name('edit-user');
Route::post('/update-user', [UserController::class, 'update_user'])->name('update-user');
