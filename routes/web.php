<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', App\Livewire\Post\Index::class)->name('post.index');
Route::get('/create', App\Livewire\Post\Create::class)->name('post.create');
Route::get('/edit/{id}', App\Livewire\Post\Edit::class)->name('post.edit');

Route::get('/user', App\Livewire\User\Index::class)->name('user.index');
Route::get('/user/create', App\Livewire\User\Create::class)->name('user.create');
Route::get('/user/{id}', App\Livewire\User\Edit::class)->name('user.edit');


Route::get('/role', App\Livewire\Role\Index::class)->name('role.index');
Route::get('/role/create', App\Livewire\Role\Create::class)->name('role.create');
Route::get('/role/{id}', App\Livewire\Role\Edit::class)->name('role.edit');

Route::get('/permission', App\Livewire\Permission\Index::class)->name('permission.index');
Route::get('/permission/create', App\Livewire\Permission\Create::class)->name('permission.create');
Route::get('/permission/{id}', App\Livewire\Permission\Edit::class)->name('permission.edit');







