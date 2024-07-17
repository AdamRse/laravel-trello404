<?php

use App\Http\Controllers\BoardsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth')->group(function () {
//     Route::Resource('boards', BoardsController::class)->names([
//         'index' => 'boards.index',
//         'create' => 'boards.create',
//         'store' => 'boards.store',
//         'show' => 'boards.show',
//         'update' => 'boards.update',
//         'destroy' => 'boards.destroy',
//     ]);
// });

Route::resource('boards', BoardsController::class)//La route /board est créée en prenant comme modèle BoardController
    ->only(['index', 'store', 'create'])//Les méthodes de boardController utilisées
    ->middleware(['auth', 'verified']);//Requiert l'authentification

require __DIR__.'/auth.php';
