<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [UserController::class , "index"]);
Route::get('/user_create' , [UserController::class , 'create'])->name('users.create');
Route::delete('/users/{user}' , [UserController::class , 'destroy'])->name('users.destroy');
Route::get('/user/{user}/edit' , [UserController::class , 'edit'])->name('users.edit');
Route::post('/user_store' , [UserController::class , 'store'])->name('users.store');
Route::put('/user/{user}' , [UserController::class , 'update'])->name('users.update');

Route::get('/category' , [CategoryController::class , "index"]);
Route::get('/category_create' , [CategoryController::class , 'create'])->name('category.create');
Route::delete('/categories/{id}' , [CategoryController::class , 'destroy'])->name('category.destroy');
Route::get('/category/{id}/edit' , [CategoryController::class , 'edit'])->name('category.edit');
Route::post('/category_store' , [CategoryController::class , 'store'])->name('category.store');
Route::put('/category/{category}' , [CategoryController::class , 'update'])->name('category.update');