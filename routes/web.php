<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Redirect;
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
Route::redirect('/','/home');
Route::get('/home',[GameController::class,'index'])->name('home');;
Route::get('/games/discover',[GameController::class,'discover'])->name('discover');
Route::get('/games/comming-soon',[GameController::class,'commingSoon'])->name('comming-soon');
Route::get('/games/mobile',[GameController::class,'MobileGames'])->name('mobile');
Route::get('/game/show/{slug}',[GameController::class,'show'])->name('game.show');
Route::get('/games/top-250',[GameController::class,'Top250'])->name('top-250');

