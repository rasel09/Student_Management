<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\FacultiesController;
use App\Http\Controllers\Admin\DepartmentController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -------------------------------- Route Group Middleware ---------------------------------

Route::group(['middleware' => 'auth'], function () {

    // ---------------------------------------- Admin Route ----------------------------------

    // --------------------------------- Department Route ----------------------------------------
    Route::get('/', [DepartmentController::class, 'index'])->name('depart.index');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('depart.create');
    Route::post('/department/store', [DepartmentController::class, 'store'])->name('depart.store');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('depart.edit');
    Route::put('/department/update/{id}', [DepartmentController::class, 'update'])->name('depart.update');
    Route::delete('/department/delete/{id}', [DepartmentController::class, 'destroy'])->name('depart.destroy');


    //  ----------------------------------------- Class Route ------------------------------------------

    Route::get('/class', [ClassController::class, 'index'])->name('class.index');
    Route::get('/class/create', [ClassController::class, 'create'])->name('class.create');
    Route::post('class/store', [ClassController::class, 'store'])->name('class.store');
    Route::get('/clsss/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
    Route::put('/class/update/{id}', [ClassController::class, 'update'])->name('class.update');
    Route::delete('/clsss/delete/{id}', [ClassController::class, 'destroy'])->name('class.destroy');


    //  ----------------------------------- Student Route ----------------------------------------
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/class/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/class/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/class/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

    //  ------------------------------------------ Facultie Route ---------------------------------
    Route::get('/facultie', [FacultiesController::class, 'index'])->name('facultie.index');
    Route::get('/facultie/create', [FacultiesController::class, 'create'])->name('facultie.create');
    Route::post('facultie/store', [FacultiesController::class, 'store'])->name('facultie.store');
    Route::get('/facultie/edit/{id}', [FacultiesController::class, 'edit'])->name('facultie.edit');
    Route::put('/facultie/update/{id}', [FacultiesController::class, 'update'])->name('facultie.update');
    Route::delete('/facultie/delete/{id}', [FacultiesController::class, 'destroy'])->name('facultie.destroy');
});