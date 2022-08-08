<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UserTicketController;
use App\Http\Controllers\TicketMessageController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\UserTicketMessageController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if (Auth::user()->hasRole('Admin')) {
            return view('dashboard');
        } else {
            return redirect()->route('user.ticket.index');
        }
    })->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {
        Route::resource('ticket', UserTicketController::class);
        Route::scopeBindings()->group(function () {
            Route::resource('ticket.message', UserTicketMessageController::class);
        });
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('platform', PlatformController::class);
        Route::resource('department', DepartmentController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('ticket', TicketController::class);
        Route::resource('ticket.message', TicketMessageController::class);
    });

    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/', [AccountController::class, 'settings'])->name('settings');
        Route::get('/security', [AccountController::class, 'security'])->name('security');
        Route::post('/security/changepassword', [AccountController::class, 'changePassword'])->name('security.changepassword');
    });
});

require __DIR__ . '/auth.php';
