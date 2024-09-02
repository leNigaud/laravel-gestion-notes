<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\NoteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('index');
// });

Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('notes', NoteController::class);


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// Route::get('/students', function () {
//     return view('students');
// })->name('students');

// Route::get('/subjects', function () {
//     return view('subjects');
// })->name('subjects');

// Route::get('/notes', function () {
//     return view('notes');
// })->name('notes');
