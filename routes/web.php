<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AviController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionsController;


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
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('layouts/partials/navbar');
    })->middleware(['verified'])->name('dashboard');

    //GESTION PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //GESTION AVIS


    Route::group(['prefix' => 'avis'], function() {
        Route::get('/list', [AviController::class, 'index'])->name('avis.index');
        Route::get('/create', [AviController::class, 'create'])->name('avis.create');
        Route::post('/create', [AviController::class, 'store'])->name('avis.store');
        Route::get('/avis/{avi}/show', [AviController::class, 'show'])->name('avis.show');
        Route::get('avis/history/{id_credit}', [AviController::class, 'history'])->name('avis.history');
        //        Route::get('/{avi}/show{id}', [AviController::class, 'show'])->name('avis.show');

        Route::get('/{avi}/edit', [AviController::class, 'edit'])->name('avis.edit');
        Route::patch('/{avi}/update', [AviController::class, 'update'])->name('avis.update');
        Route::delete('/{avi}/delete', [AviController::class, 'destroy'])->name('avis.destroy');
    });



    //GESTION CREDITS

    Route::group(['prefix' => 'credits'], function() {
        Route::get('/list', [CreditController::class, 'index'])->name('credits.index');
        Route::get('/create', [CreditController::class, 'create'])->name('credits.create');
        Route::post('/create', [CreditController::class, 'store'])->name('credits.store');
        Route::get('/credits/{credit}/show', [CreditController::class, 'show'])->name('credits.show');
        //        Route::get('/{credit}/show{id}', [CreditController::class, 'show'])->name('credits.show');
        ///Route::get('/credits/{id}/generate-pdf', [CreditController::class, 'generatePDF'])->name('credits.generate-pdf');
        Route::get('/credits/{credit}/generate-pdf', [PDFController::class, 'generatePDF'])->name('credits.generate-pdf');

        Route::get('/{credit}/edit', [CreditController::class, 'edit'])->name('credits.edit');
        Route::patch('/{credit}/update', [CreditController::class, 'update'])->name('credits.update');
        Route::delete('/{credit}/delete', [CreditController::class, 'destroy'])->name('credits.destroy');
    });
    


    //GESTION CLIENTS

    Route::group(['prefix' => 'clients'], function() {
        Route::get('/list', [ClientController::class, 'list'])->name('clients.list');
        Route::get('/ajouter', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/ajouter', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/{client}/show', [ClientController::class, 'show'])->name('clients.show');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::patch('/{client}/update', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/{client}/delete', [ClientController::class, 'destroy'])->name('clients.destroy');
    });

    //GESTION USERS
    Route::group(['prefix' => 'users'], function() {
        Route::get('/list', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/create', [UsersController::class, 'store'])->name('users.store');
        Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    });

    ///routes permissions w roles
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);

    
});

require __DIR__.'/auth.php';

