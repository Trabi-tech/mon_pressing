<?php

use App\Http\Controllers\{
    ClientsController,
    FactureController,
    DashboardController,
    RendezVousController,
    LaverieController
};
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::controller(ClientsController::class)->group(function () {
    Route::get('/Clients', 'index')->name('Clients.index');
    Route::get('/Clients/create', 'create')->name('Clients.create');
    Route::post('/Clients/store', 'store')->name('Clients.store');
    Route::get('/Clients/show/{slug}', 'show')->name('Clients.show');
    Route::get('/Clients/edit/{slug}', 'edit')->name('Clients.edit');
    Route::post('/Clients/update', 'update')->name('Clients.update');
    Route::get('/Clients/{slug}', 'destroy')->name('Clients.destroy');
});

Route::controller(FactureController::class)->group(function () {
    Route::get('/Factures/create/{slug}', 'create')->name('Factures.create');
    Route::post('/Factures/store', 'store')->name('Factures.store');
    Route::get('/Factures/{id}', 'show')->name('Factures.show');
    Route::get('/factures/{facture}/imprimer', 'imprimer')->name('Factures.imprimer');
});

Route::controller(RendezVousController::class)->group(function () {
    Route::get('/rendezvous', 'index')->name('rendezvous.index');
});

Route::controller(LaverieController::class)->group(function () {
    Route::get('/laverie/create', 'create')->name('laverie.create');
    Route::post('/laverie/store', 'store')->name('laverie.store');
    Route::get('/laverie/edit',  'edit')->name('laverie.edit');
    Route::put('/laverie/{id}', 'update')->name('laverie.update');
});



});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
