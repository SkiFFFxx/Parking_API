<?php

use App\Http\Controllers\ParkingController;
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
});


//Route::group(['middleware' => ['isAdmin']], function () {
//
//});


Route::get('/parking', [ParkingController::class, 'index'])->name('parking.index');

Route::get('/parking/create', [ParkingController::class, 'create'])->name('parking.create');




Route::resource('workers', \App\Http\Controllers\WorkerController::class);  #->middleware(['auth', 'isAdmin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
