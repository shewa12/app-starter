<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('main');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('login');
                


Route::middleware(['auth','verified'])->group(function(){

	Route::get('/dashboard',[DashboardController::class, 'index'])
				->name('dashboard');

	Route::get('my-profile',[DashboardController::class, 'myProfile'])
				->name('myProfile');

	Route::post('update-avatar', [DashboardController::class, 'updateAvatar'])
				->name('updateAvatar');

	Route::get('update-password', [DashboardController::class, 'updatePassword'])
				->name('updatePassword');		

	Route::post('update-password', [DashboardController::class, 'passwordReset'])
				->name('passwordReset');				
});

require __DIR__.'/auth.php';

