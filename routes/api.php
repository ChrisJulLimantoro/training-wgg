<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/students', [studentController::class, 'index'])->name('students.index');
Route::get('/students', function () {
    return response()->json([
        'message' => 'Hello World'
    ], 200);
});
Route::post('/students', [studentController::class, 'store'])->name('students.store');
Route::post('/students/{id}', [studentController::class, 'edit'])->name('students.edit');
Route::delete('/students/{id}', [studentController::class, 'destroy'])->name('students.destroy');
