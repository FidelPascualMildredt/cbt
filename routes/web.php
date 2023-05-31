<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\USUARIOSController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MouseController;
use App\Http\Controllers\OrdenadorController;
use App\Http\Controllers\ContainerController;
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
    return view('auth.login');
});

Route::get('/', function () {
    return view('index');
});
/*
Route::get('/usuarios', function () {
    return view('usuarios.index');
});

Route::get('/usuarios/create',[USUARIOSController::class,'create']);
*/

Route::resource('usuarios',USUARIOSController::class);
Auth::routes();

Route::get('/home', [USUARIOSController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function () {
    Route::get('/', [USUARIOSController::class, 'index'])->name('home');
});
Route::post('register', 'App\Http\Controllers\Api\AuthController@register');

Route::resource('keyboards',KeyboardController::class);
Route::resource('monitors',MonitorController::class);
Route::resource('mouses',MouseController::class);
Route::resource('ordenadores',OrdenadorController::class);

Route::resource('equipments',EquipmentController::class);

Route::resource('layouts',ContainerController::class);
Route::get('/pdf', [EquipmentController::class, 'generarPDF'])->name('pdf');


