<?php

use App\Http\Controllers\Student;
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

Route::get('/students', [Student::class, 'index']);
Route::post('/student/store', [Student::class, 'store']);
Route::get('/student/search', [Student::class, 'search']);
Route::get('/student/{id}', [Student::class, 'edit']);
Route::put('/student/{id}', [Student::class, 'update']);
Route::delete('/student/{id}', [Student::class, 'destroy']);


