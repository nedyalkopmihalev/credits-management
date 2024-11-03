<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ClientsCreditsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('clients/client-insert', [ClientsController::class, 'clientInsert']);
Route::any('clients-credits/client-credit-insert', [ClientsCreditsController::class, 'clientCreditInsert']);
Route::any('/', [ClientsCreditsController::class, 'getAllClientsCredits']);