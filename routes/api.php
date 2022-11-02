<?php

use App\Http\Controllers\FinancialPeriodsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('FinancialPeriods', FinancialPeriodsController::class);
// Route::put('FinancialPeriods', [FinancialPeriodsController::class, 'update']);
Route::put('FinancialPeriods', [FinancialPeriodsController::class, 'update'])->name('FinancialPeriodsController.update');
Route::delete('FinancialPeriods', [FinancialPeriodsController::class, 'destroy'])->name('FinancialPeriodsController.delete');