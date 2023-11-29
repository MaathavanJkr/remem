<?php

use App\Http\Controllers\StacksController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[StacksController::class, 'index'])->name('dashboard');

    Route::get('/stack',[StacksController::class, 'add']);
    Route::post('/stack',[StacksController::class, 'create']);
    
    Route::get('/stack/{stack}', [StacksController::class, 'edit']);
    Route::post('/stack/{stack}', [StacksController::class, 'update']);
});
