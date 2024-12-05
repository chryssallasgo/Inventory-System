<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Items;
use App\Livewire\Items\Edit;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/generate-report', [ReportController::class, 'generateReport'])->name('items.report');

    Route::get('/items', Items\Index::class)->name('items.index');
    Route::get('/items/create', Items\Create::class)->name('items.create');
    Route::get('/items/edit/{id}', Edit::class)->name('items.edit');  

});

require __DIR__.'/auth.php';
