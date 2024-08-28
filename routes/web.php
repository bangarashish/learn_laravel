<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InterpreterController;

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
// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', function () {
    return view('welcome');
});




Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/login', [AdminController::class, 'login'])->name('login');


Route::middleware('admin.access')->group(function () {

            
    Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');


    //Route::get('/users', [UserController::class, 'index']);
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/addUser', [UserController::class, 'addUser'])->name('addUser');
    Route::post('/store-user', [UserController::class, 'store_user'])->name('store-user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit_user'])->name('edit-user');
    Route::post('/update-user', [UserController::class, 'update_user'])->name('update-user');

    
    Route::get('/interpreter', [InterpreterController::class, 'index'])->name('interpreter.index');
    Route::get('/interpreter/create', [InterpreterController::class, 'create'])->name('interpreter.create');
    Route::post('/interpreter', [InterpreterController::class, 'store'])->name('interpreter.store');
    Route::get('/interpreter/{interpreter}', [InterpreterController::class, 'show'])->name('interpreter.show');
    Route::put('/interpreter/{interpreter}', [InterpreterController::class, 'update'])->name('interpreter.update');
    Route::delete('/interpreter/{interpreter}', [InterpreterController::class, 'destroy'])->name('interpreter.destroy');


});

