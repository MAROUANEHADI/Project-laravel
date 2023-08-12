<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ServiceController;
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




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/', function () {
    return view('layout');
})->middleware(['auth', 'verified']);


Route::resource('dashboarde', DashboardController::class)->middleware(['auth', 'verified']);
Route::resource('client', ClientController::class)->middleware(['auth', 'verified']);

Route::resource('devis', DevisController::class)->middleware(['auth', 'verified']);
Route::resource('facture', FactureController::class)->middleware(['auth', 'verified']);
Route::resource('service', ServiceController::class)->middleware(['auth', 'verified']);
