<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\uploadtodo;

Route::get('/', function () {
    // return view('welcome');
    return view("first");
});

Route::post('/todo', function(){
    return view("todo_list");
});

Route::post('/upload', [uploadtodo::class, 'submit'])->name('todo.submit');



