<?php

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

//Ajout de la route ressources pour le controller client
Route::ressources('/client','App\Http\Controllers\ClientController');
//Notons que cela creer automatiquement les routes pour les methodes CRUD du controller client
