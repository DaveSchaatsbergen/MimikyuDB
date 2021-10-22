<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\controllers\SearchController;

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

Route::get('/', [HomeController::class, 'index']);

Route::post('/pokemon', [SearchController::class, 'searchPokemon']);

Route::get('/pokemon/moves/{id}', [SearchController::class, 'moveData']);

Route::get('/pokemon/{id}', [SearchController::class, 'searchPokemon']);
