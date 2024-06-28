<?php
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
// note
Route::middleware('auth')->group(function () {
Route::post('/note/store',[NoteController::class,'store'])->name('note.store');
Route::get('/note/show/{id}',[NoteController::class,'show'])->middleware('Category');
Route::get('/note/destroy/{id}',[NoteController::class,'destroy'])->middleware('ShowNote');
Route::get('/note/afficher/{id}',[NoteController::class,'afficher'])->middleware('ShowNote');
Route::get('/note/modifier/{id}',[NoteController::class,'modifier'])->middleware('modifier');
Route::post('/note/modifier',[NoteController::class,'modifier_note'])->name('note.modifier');
});
//category
Route::middleware('auth')->group(function () {
Route::post('/category/store',[categoryController::class,'store'])->name('category.store');
Route::get('/category/destroy/{id}',[categoryController::class,'destroy'])->middleware('Category');
});

Route::get('/dashboard',[dashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
