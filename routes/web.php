<?php

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->get('/class', function(){
    $myId = Auth::user()->id;
    return view('class',compact('myId'))    ; //the class view will open the text editor for now
});

Route::get('/all-slides',[\App\Http\Controllers\SlideController::class,'index']);
Route::get('/new-slides',[\App\Http\Controllers\SlideController::class,'new_slides']);
Route::get('/edit-slides/{id}',[\App\Http\Controllers\SlideController::class,'edit_lesson']);
