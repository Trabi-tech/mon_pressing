<?php

use App\Http\Controllers\{
    ClientsController,

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

Route::controller(ClientsController::class)->group(function () {
    Route::get('/Clients', 'index')->name('Clients.index');
    Route::get('/Clients/create', 'create')->name('Clients.create');
    Route::post('/Clients/store', 'store')->name('Clients.store');
    Route::get('/Clients/show/{slug}', 'show')->name('Clients.show');
    Route::get('/Clients/edit/{slug}', 'edit')->name('Clients.edit');
    Route::post('/Clients/update', 'update')->name('Clients.update');
    Route::get('/Clients/{slug}', 'destroy')->name('Clients.destroy');
});

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
