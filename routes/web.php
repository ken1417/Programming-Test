<?php
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[TeacherController::class,'index']);
Route::post('dataInsert',[TeacherController::class,'DataInsert']);
Route::get('ajaxdata', [TeacherController::class, 'getdata'])->name('getdata');
*/
Route::get('/', function () {
    return view('home');
});

Route::get('teachers', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('teachers/store', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('teachers/edit/{id}/', [TeacherController::class, 'edit']);
Route::post('teachers/update', [TeacherController::class, 'update'])->name('teacher.update');
Route::get('teachers/destroy/{id}/', [TeacherController::class, 'destroy']);
