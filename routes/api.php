<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


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
    Route::post('/', [EmployeeController::class, 'importCSV']);
    Route::get('/', [EmployeeController::class, 'getAllEmployee']);
    Route::get('/{id}', 'EmployeeController@getSingleEmployee');
    Route::delete('/{id}', 'EmployeeController@deleteSingleEmployee');
});