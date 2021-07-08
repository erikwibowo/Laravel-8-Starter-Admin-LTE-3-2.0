<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
})->name('index');

Route::prefix('/admin')->middleware(['adminauth'])->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    })->name('admin.dashboard');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

});
