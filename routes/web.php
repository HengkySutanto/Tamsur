<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/members/create', [StudentController::class, 'create'])->name('members.create');
Route::get('/members/filter', [StudentController::class, 'filter'])->name('members.filter');
Route::get('/members', [StudentController::class, 'index'])->name('members');
Route::post('/members', [StudentController::class, 'store']);
Route::get('/members/{student}', [StudentController::class, 'show'])->name('members.show');
Route::delete('/members/{student}', [StudentController::class, 'destroy'])->name('members.destroy');
Route::get('/members/{student}/edit', [StudentController::class, 'edit'])->name('members.edit');
Route::put('/members/{student}', [StudentController::class, 'update'])->name('members.update');


Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances');
Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');

Route::delete('/sessions/{session}', [SessionController::class, 'destroy'])->name('sessions.delete');
Route::post('/sessions/store', [SessionController::class, 'store'])->name('sessions.store');