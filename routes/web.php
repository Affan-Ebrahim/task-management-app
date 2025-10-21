<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController; // <-- Make sure this exists

Route::get('/', function () {
    return redirect('/tasks');
});

// Dashboard route required by Laravel Breeze
Route::get('/dashboard', function () {
    $tasks = Task::all();
    return view('dashboard', compact('tasks'));
})->middleware(['auth'])->name('dashboard');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Task resource routes
    Route::resource('tasks', TaskController::class);

    // Profile routes to fix "Route [profile.edit] not defined" error
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
