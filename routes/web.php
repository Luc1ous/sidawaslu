<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanwascamController;
use App\Http\Controllers\PanwasdesController;
use App\Http\Controllers\PanwastpsController;
use App\Http\Controllers\PengalamanKepemiluanController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\UserController;
use App\Models\Panwastps;
use App\Models\Tahun;
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

// Route Login & Logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Route Dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Route User
Route::controller(UserController::class)->middleware('auth')->group(function (){
    Route::get('/user', 'index');
});

// Route Tahun
Route::controller(TahunController::class)->middleware('auth')->group(function (){
    Route::get('/tahun', 'index');
    Route::get('/tahun/add', 'add');
    Route::get('/tahun/{id}', 'view');
    Route::get('/tahun/delete/{id}', 'delete');
    Route::post('/tahun/add', 'store');
    Route::post('/tahun/edit/{id}', 'update');
});

// Route Pengalaman Kepemiluan
Route::controller(PengalamanKepemiluanController::class)->middleware('auth')->group(function (){
    Route::get('/pengalaman', 'index');
    Route::get('/pengalaman/add', 'add');
    Route::get('/pengalaman/{id}', 'view');
    Route::get('/pengalaman/delete/{id}', 'delete');
    Route::post('/pengalaman/add', 'store');
    Route::post('/pengalaman/edit/{id}', 'update');
});

// Route Panwascam
Route::controller(PanwascamController::class)->middleware('auth')->group(function(){
    Route::get('/panwascam/{tahun}', 'index');
    Route::get('/panwascam/{tahun}/add', 'add');
    Route::post('/panwascam/{tahun}/store', 'store');
    Route::post('/panwascam/{tahun}/{id}/update', 'update');
    Route::get('/panwascam/edit/{tahun}/{id}', 'edit');
    Route::get('/panwascam/{tahun}/search', 'search');
    Route::post('/panwascam/import', 'import');
    Route::post('/panwascam/delete/{id}', 'delete');
});

// Route Panwasdes
Route::controller(PanwasdesController::class)->middleware('auth')->group(function(){
    Route::get('/panwasdes/{tahun}', 'index');
    Route::get('/panwasdes/{tahun}/search', 'search');
    Route::post('/panwasdes/import', 'import');
});

// Route Panwas TPS
Route::controller(PanwastpsController::class)->middleware('auth')->group(function(){
    Route::get('/panwastps/{tahun}', 'index');
    Route::get('/panwastps/{tahun}/search', 'search');
    Route::post('/panwastps/import', 'import');
});
