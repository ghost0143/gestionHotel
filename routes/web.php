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



//DEBUT ROUTES POUR LES CLIENTS
Route::prefix('/client')->name('client.')->group(function (){
    Route::get('/', [\App\Http\Controllers\ClientController::class, 'index'])->name('index');
    Route::get('/nouveau-client', [\App\Http\Controllers\ClientController::class, 'createForm'])->name('createForm');
    Route::post('/nouveau', [\App\Http\Controllers\ClientController::class, 'create'])->name('create');
    Route::get('/{id}/voir-le-client', [\App\Http\Controllers\ClientController::class, 'view'])->name('view');
    Route::get('/{id}/modifier-le-client', [\App\Http\Controllers\ClientController::class, 'edit'])->name('edit');
    Route::put('/{id}/modifier', [\App\Http\Controllers\ClientController::class, 'update'])->name('update');
    Route::delete('/{id}/supprimer', [\App\Http\Controllers\ClientController::class, 'destroy'])->name('destroy');
    Route::get('/recherche', [\App\Http\Controllers\ClientController::class, 'search'])->name('search');
});
//FIN ROUTES POUR LES CLIENTS


//DEBUT ROUTES POUR LES CHAMBRES
Route::prefix('/chambre')->name('chambre.')->group(function(){
    Route::get('/', [\App\Http\Controllers\ChambreController::class, 'index'])->name('index');
    Route::get('/ajouter-une-chambre', [\App\Http\Controllers\ChambreController::class, 'formCreate'])->name('formCreate');
    Route::post('/ajouter-une-chambre', [\App\Http\Controllers\ChambreController::class, 'create'])->name('create');
    Route::get('/{id}/modifier', [\App\Http\Controllers\ChambreController::class, 'edit'])->name('edit');
    Route::put('/{id}/modifier', [\App\Http\Controllers\ChambreController::class, 'update'])->name('update');
    Route::delete('/{id}/supprimer', [\App\Http\Controllers\ChambreController::class, 'destroy'])->name('destroy');
    Route::get('/recherche', [\App\Http\Controllers\ChambreController::class, 'search'])->name('search');
});
//FIN ROUTES POUR LES CHAMBRES

//DEBUT ROUTES POUR LES RESERVATIONS
Route::prefix('/reservation')->name('reservation.')->group(function(){
    Route::get('/', [\App\Http\Controllers\ReservationController::class, 'index'])->name('index');
    Route::get('/ajouter-une-reservation', [\App\Http\Controllers\ReservationController::class, 'formCreate'])->name('formCreate');
    Route::post('/ajouter-une-reservation', [\App\Http\Controllers\ReservationController::class, 'create'])->name('create');
    Route::get('/{id}/modifier', [\App\Http\Controllers\ReservationController::class, 'edit'])->name('edit');
    Route::put('/{id}/modifier', [\App\Http\Controllers\ReservationController::class, 'update'])->name('update');
    Route::get('/{id}/voir-le-client', [\App\Http\Controllers\ReservationController::class, 'view'])->name('view');
    Route::put('/{id}/annuler', [\App\Http\Controllers\ReservationController::class, 'annuler'])->name('annuler');
    Route::put('/{id}/confirmer', [\App\Http\Controllers\ReservationController::class, 'confirmer'])->name('confirmer');
    Route::put('/{id}/restaurer', [\App\Http\Controllers\ReservationController::class, 'restaurer'])->name('restaurer');
    Route::delete('/{id}/supprimer', [\App\Http\Controllers\ReservationController::class, 'destroy'])->name('destroy');
    Route::get('/recherche', [\App\Http\Controllers\ReservationController::class, 'search'])->name('search');
});
//FIN ROUTES POUR LES RESERVATIONS

