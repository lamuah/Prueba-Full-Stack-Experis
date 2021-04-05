<?php

//use App\Http\Controllers\CandidatesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('candidate', CandidatesController::class);
Auth::routes();
Route::get('/home', [CandidatesControllerr::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [CandidatesController::class, 'index'])->name('home');
});
