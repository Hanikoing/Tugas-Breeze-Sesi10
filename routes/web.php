<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/books', [BookController::class, 'index'])
        ->middleware('permission:view books')
        ->name('books.index');

    Route::get('/books/create', [BookController::class, 'create'])
        ->middleware('permission:create books')
        ->name('books.create');

    Route::post('/books', [BookController::class, 'store'])
        ->middleware('permission:create books')
        ->name('books.store');

    Route::get('/books/{book}/edit', [BookController::class, 'edit'])
        ->middleware('permission:edit books')
        ->name('books.edit');

    Route::put('/books/{book}', [BookController::class, 'update'])
        ->middleware('permission:edit books')
        ->name('books.update');

    Route::delete('/books/{book}', [BookController::class, 'destroy'])
        ->middleware('permission:delete books')
        ->name('books.destroy');

    Route::get('/books/{book}', [BookController::class, 'show'])
        ->middleware('permission:view books')
        ->name('books.show');

});

require __DIR__.'/auth.php';
