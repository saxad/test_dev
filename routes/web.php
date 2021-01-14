<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StarController;

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
//     return view('partials.home');
// })->name('home');

Route::get('/', [StarController::class,'index'])->name('home');
Route::view('/addstar', 'partials.add')->name('add');

Route::post('/addstar',[StarController::class, 'store'] )->name('savestar');
Route::post('/loadstar/{id}',[StarController::class, 'load'] )->name('loadstar');
Route::delete('/delete/{id}',[StarController::class, 'destroy'])->name('delete');
Route::post('/editstar/{id}', [StarController::class, 'update'])->name('edit');
// Route::get('/editstar/{id}/update', [StarController::class, 'update'])->name('update');