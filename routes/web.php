<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\CustomerTicketController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\UserTicketController;
use App\Http\Controllers\Admin\UserServiceController;
use App\Http\Controllers\Admin\TicketMessageController;
use App\Http\Controllers\CustomerTicketMessageController;

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
            $user = Auth::user();
            return redirect()->route('customer.ticket.index', $user);
        }
    })->name('dashboard');

    Route::prefix('customer')->name('customer.')->group(function () {
        Route::scopeBindings()->group(function () {
            Route::resource('ticket', CustomerTicketController::class);
            Route::resource('ticket.message', CustomerTicketMessageController::class);
        });
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('user.service', UserServiceController::class);
        Route::resource('user.ticket', UserTicketController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('platform', PlatformController::class);
        Route::resource('department', DepartmentController::class);
        Route::resource('ticket', TicketController::class);
        Route::resource('status', StatusController::class);
        Route::resource('ticket.message', TicketMessageController::class);
    });

    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/', [AccountController::class, 'settings'])->name('settings');
        Route::get('/security', [AccountController::class, 'security'])->name('security');
        Route::post('/security/changepassword', [AccountController::class, 'changePassword'])->name('security.changepassword');
    });
});

require __DIR__ . '/auth.php';
