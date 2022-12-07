<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\BarcodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    });
     Route::get('/',[CardController::class,'index']);
     Route::get('/cards/create', [CardController::class, 'create']);
     Route::get('/cards/create',[BarcodeController::class,'create']);
     Route::get('/cards/{card}',[CardController::class,'show']);
     Route::post('/cards', [CardController::class, 'store']);
     Route::post('/cards', [BarcodeController::class, 'store']);
     Route::get('/points/charge',[PointController::class,'charge']);


require __DIR__.'/auth.php';
