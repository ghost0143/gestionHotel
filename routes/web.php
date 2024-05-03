<?php

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

Route::get('/', function () {
    return view('auth.login');
})->name('auth.login'); 

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard.index'); 

//DEBUT ROUTES POUR LES UTILISATEUR

Route::prefix('/utilisateur')->name('utilisateur.')->group(function (){
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
    Route::get('/nouvel-utilisateur', [\App\Http\Controllers\UserController::class, 'form'])->name('formCreate');
    Route::post('/new', [\App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::get('/{id}/modifier', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::put('{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/modifier-mon-mot-de-passe', [\App\Http\Controllers\UserController::class, 'editPassword'])->name('editPassword');
    Route::put('/modifier-mon-mot-de-passe/{id}', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword');
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin'])->name('auth.doLogin');
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');


//DEBUT ROUTES POUR LES UTILISATEUR

