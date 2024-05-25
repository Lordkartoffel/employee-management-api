<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeImportController;

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

// api that handles the csv import and CRUD
Route::prefix('employees')->group(function () {
    Route::post('/import/record', [EmployeeController::class, 'importRecord']);
    Route::get('/', [EmployeeController::class, 'getEmployeeRecords']);
});