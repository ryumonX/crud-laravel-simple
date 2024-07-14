<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view', function () {
    return view('utama');
});

Route::resource('students', StudentController::class);
Route::get('/', [StudentController::class, 'index']); // Mengarahkan root ke index c

Route::resource('jurusans', JurusanController::class);
route::get('/jurusan', [JurusanController::class, 'index']);
