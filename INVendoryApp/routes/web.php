<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\PCParts;
use App\Livewire\PCParts\EditPC;
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
    Route::get('/generate-report', [ReportController::class, 'generateReport'])->name('pcparts.report');

    Route::get('/pcparts', PCParts\IndexPC::class)->name('pcparts.indexpc');
    Route::get('/pcparts/createpc', PCParts\CreatePC::class)->name('pcparts.createpc');
    Route::get('/pcparts/{item}/editpc', EditPC::class)->name('pcparts.editpc');  

});

require __DIR__.'/auth.php';
