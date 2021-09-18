<?php

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

Route::get('/', function () {
    return redirect(route('discussions.index'));
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('discussions', App\Http\Controllers\DiscussionsController::class);

Route::resource('channels', App\Http\Controllers\ChannelsController::class);

Route::resource('discussions/{discussion}/replies', App\Http\Controllers\RepliesController::class);
Route::get('discussions/{discussion}/replies/{reply}/like', [App\Http\Controllers\RepliesController::class, 'like'])->name('reply.like');
Route::get('discussions/{discussion}/replies/{reply}/unlike', [App\Http\Controllers\RepliesController::class, 'unlike'])->name('reply.unlike');

Route::post('discussions/{discussion}/replies/{reply}/mark-as-best', [App\Http\Controllers\DiscussionsController::class, 'reply'])->name('discussions.mark');

Route::get('user/notification', [App\Http\Controllers\UsersController::class, 'notifications'])->name('users.notifications');
