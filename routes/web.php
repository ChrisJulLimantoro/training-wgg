<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\studentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return view('student');
});


Route::get('/students', [studentController::class, 'index'])->name('students.index');
Route::post('/students', [studentController::class, 'store'])->name('students.store');
Route::post('/students/{id}', [studentController::class, 'edit'])->name('students.edit');
Route::delete('/students/{id}', [studentController::class, 'destroy'])->name('students.destroy');
