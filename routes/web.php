<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Display the welcome page
Route::get('/welcome', function () {
    return view('Layout.content.student');
});

// Display the main page
Route::get('/', function () {
    return view('Layout.Views.Utama');
});

// Display the department page
Route::get('/Departement', function () {
    return view('Layout.Views.Departement');
});

// Display the dashboard page
Route::get('/main', function () {
    return view('Layout.content.dashboard');
});

// Dashboard index route
Route::get('/main', [DashboardController::class, 'index'])->name('dashboard.index');

// Student resource routes
Route::resource('students', StudentController::class);
Route::get('/', [StudentController::class, 'index']);

// Department resource routes
Route::resource('departements', DepartementController::class);
Route::get('/Departement', [DepartementController::class, 'index']);

// Display the login page
Route::get('login', function () {
    return view('layout.auth.login');
})->name('login');

// Registration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.submit');

// Authentication routes
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
