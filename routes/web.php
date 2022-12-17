<?php

use App\Http\Controllers\AdHocController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanwascamController;
use App\Http\Controllers\PanwasdesController;
use App\Http\Controllers\PanwastpsController;
use App\Http\Controllers\PengalamanKepemiluanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\UserController;
use App\Models\AdHoc;
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

// Route Register
Route::post('/register', [RegisterController::class, 'register']);

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
    Route::get('/tahun/edit/{id}', 'view');
    Route::get('/tahun/delete/{id}', 'delete');
    Route::post('/tahun/add', 'store');
    Route::post('/tahun/edit/{id}', 'update');
});

// Route Ad Hoc
Route::controller(AdHocController::class)->middleware('auth')->group(function(){
    Route::get('/adhoc', 'index')->name('adhoc.index');
    Route::get('/adhoc/search', 'search');
    Route::get('/adhoc/filter/{filter}', 'filter');
});

// Route Panwascam
Route::controller(PanwascamController::class)->middleware('auth')->group(function(){
    Route::get('/panwascam/{tahun}', 'index');
    Route::get('/panwascam/{tahun}/search', 'search');
    Route::get('/panwascam/{tahun}/add', 'add');
    Route::get('/panwascam/{tahun}/{id}/edit', 'edit');
    Route::get('/panwascam/{tahun}/filter/{filter}', 'filter');
    Route::post('/panwascam/import', 'import');
    Route::post('/panwascam/{tahun}/store', 'store');
    Route::post('/panwascam/{tahun}/{id}/update', 'update');
    Route::post('/panwascam/delete/{id}', 'delete');
});

// Route Panwasdes
Route::controller(PanwasdesController::class)->middleware('auth')->group(function(){
    Route::get('/panwasdes/{tahun}', 'index');
    Route::get('/panwasdes/{tahun}/search', 'search');
    Route::get('/panwasdes/{tahun}/add', 'add');
    Route::get('/panwasdes/{tahun}/{id}/edit', 'edit');
    Route::get('/panwasdes/{tahun}/filter/{filter}', 'filter');
    Route::post('/panwasdes/import', 'import');
    Route::post('/panwasdes/{tahun}/store', 'store');
    Route::post('/panwasdes/{tahun}/{id}/update', 'update');
    Route::post('/panwasdes/delete/{id}', 'delete');
});

// Route Panwas TPS
Route::controller(PanwastpsController::class)->middleware('auth')->group(function(){
    Route::get('/panwastps/{tahun}', 'index');
    Route::get('/panwastps/{tahun}/search', 'search');
    Route::get('/panwastps/{tahun}/add', 'add');
    Route::get('/panwastps/{tahun}/{id}/edit', 'edit');
    Route::get('/panwastps/{tahun}/filter/{filter}', 'filter');
    Route::post('/panwastps/import', 'import');
    Route::post('/panwastps/{tahun}/store', 'store');
    Route::post('/panwastps/{tahun}/{id}/update', 'update');
    Route::post('/panwastps/delete/{id}', 'delete');
});
