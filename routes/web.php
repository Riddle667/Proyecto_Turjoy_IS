<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TicketController;


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

Route::get('/', [RouteController::class, 'welcomeIndex'])->name('welcome');
Route::get('/search',[TicketController::class, 'search'])->name('search');
Route::get('/search/{code}',[TicketController::class, 'show'])->name('search.ticket');

Route::get('/get/origins', [RouteController::class, 'getOrigins']);
Route::get('/get/destinations/{origin}', [RouteController::class, 'getDestinations']);

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/add/route', [RouteController::class, 'indexAddRoutes'])->name('routes.index');
    Route::post('/addroute', [RouteController::class, 'routeCheck'])->name('route.check');
    Route::get('/result/routes', [RouteController::class, 'indexRoutes'])->name('routesAdd.index');
});

Route::fallback(function () {
    return view('error/error');
});

