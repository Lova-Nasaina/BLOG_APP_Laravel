<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::middleware("auth")->group(function () {
    // Route::view("/", "welcome")->name("hame");

    Route::get("/home", [AuthController::class,"home"])->middleware("auth")->name("home");
    Route::get("/profil", [AuthController::class,"profilPage"])->name("compte.profil");
    Route::get('/createproduct', [PageController::class,'createproduct']);
    Route::post('/saveproduct', [PageController::class,'saveproduct']);

    // Route::view('/home', ['user' => Auth::user()])->middleware('auth');
});

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::get("/login", [AuthController::class, 'login'])->name("login");
Route::post('/login', [AuthController::class,'loginPost'])->name("login.post");
Route::get("/register", [AuthController::class,"register"])->name("register");
Route::post("/register", [AuthController::class,"registerPost"])->name("register.post");

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
//     return view('welcome');
// });



Route::get('/service', [PageController::class,'service']);
Route::get('/show/{id}', [PageController::class,'show']);




Route::put('/saveModifProduct/{id}', [PageController::class,'saveModifProduct']);
Route::get('/edit/{id}', [PageController::class,'editproduct']);
Route::delete('/delete/{id}', [PageController::class,'deleteproduct']);
