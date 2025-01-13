<?php

use App\Http\Controllers\PageController;
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

Route::get('/home', [PageController::class,'home']);

Route::get('/service', [PageController::class,'service']);
Route::get('/show/{id}', [PageController::class,'show']);
Route::get('/createproduct', [PageController::class,'createproduct']);

Route::post('/saveproduct', [PageController::class,'saveproduct']);


Route::put('/saveModifProduct/{id}', [PageController::class,'saveModifProduct']);
Route::get('/edit/{id}', [PageController::class,'editproduct']);
Route::delete('/delete/{id}', [PageController::class,'deleteproduct']);
