<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AccountController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('role', RoleController::class);
});

Route::middleware(['auth'])->prefix('account')->name('account.')->group(function () {
    Route::get('/', [AccountController::class, 'settings'])->name('settings');
    Route::get('/security', [AccountController::class, 'security'])->name('security');
    Route::post('/security/changepassword', [AccountController::class, 'changePassword'])->name('security.changepassword');
});

require __DIR__ . '/auth.php';
