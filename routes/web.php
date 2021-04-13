<?php

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

Route::get('/members/{student}', [StudentController::class, 'show'])->name('members.show');
Route::delete('/members/{student}', [StudentController::class, 'destroy'])->name('members.destroy');
Route::get('/members', [StudentController::class, 'index'])->name('members');
Route::post('/members', [StudentController::class, 'store']);
Route::get('/members/create', [StudentController::class, 'create']);