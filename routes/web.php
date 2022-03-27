<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\ChatController;
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

Route::get('/users', function () {
    return view('users');
})->middleware(['auth'])->name('users');


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/users');
    });

    Route::get('/users', [ChatController::class, 'index'])->name('users');
    Route::get('/chat/{id}', [ChatController::class, 'chat'])->name('chat');
    Route::get('/conversation/{id}', [ChatController::class, 'conversation'])->name('conversation');
    Route::get('/list-users', [ChatController::class, 'listUsers']);
    Route::post('/send-message/{id}', [ChatController::class, 'sendMessage'])->name('sendMessage');
});
require __DIR__.'/auth.php';
