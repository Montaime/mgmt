<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home');
});

Route::get('/invite/{invite}', function (\App\Models\Invite $invite) {
    return Inertia::render('Onboarding', [
        'invite' => $invite
    ]);
});

Route::get('/@{artist:slug}', function (\App\Models\Artist $artist) {
    return Inertia::render('Artist', [
        'artist' => $artist
    ]);
});

Route::prefix('app')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard/Home');
    })->name('app::home');


    Route::get('artists', [\App\Http\Controllers\ArtistController::class, 'index'])->name('app::artists.index');
    Route::get('artist/{artist}', [\App\Http\Controllers\ArtistController::class, 'show'])->name('app::artists.show');
    Route::get('artist/{artist}/edit', [\App\Http\Controllers\ArtistController::class, 'edit'])->name('app::artists.edit');
    Route::post('artist/{artist}/edit', [\App\Http\Controllers\ArtistController::class, 'update'])->name('app::artists.update');
    Route::delete('artist/{artist}', [\App\Http\Controllers\ArtistController::class, 'destroy'])->name('app::artists.delete');

    Route::get('invites', [\App\Http\Controllers\InviteController::class, 'index'])->name('app::invites.index');
    Route::get('invites/new', [\App\Http\Controllers\InviteController::class, 'create'])->name('app::invites.create');
    Route::post('invites/new', [\App\Http\Controllers\InviteController::class, 'store'])->name('app::invites.create');
    Route::get('invite/{invite}', [\App\Http\Controllers\InviteController::class, 'show'])->name('app::invites.show');
    Route::get('invite/{invite}/edit', [\App\Http\Controllers\InviteController::class, 'edit'])->name('app::invites.edit');
    Route::post('invite/{invite}/edit', [\App\Http\Controllers\InviteController::class, 'update'])->name('app::invites.update');
    Route::delete('invite/{invite}', [\App\Http\Controllers\InviteController::class, 'destroy'])->name('app::invites.delete');

    Route::get('users')->name('app::users.index');
    Route::get('user/{user}')->name('app::users.show');
    Route::get('user/{user}/edit')->name('app::users.edit');
    Route::post('user/{user}/edit')->name('app::users.update');
    Route::delete('user/{user}')->name('app::users.delete');

    Route::get('releases', [\App\Http\Controllers\ReleaseController::class, 'index'])->name('app::releases.index');
    Route::get('releases/new', [\App\Http\Controllers\ReleaseController::class, 'create'])->name('app::releases.create');
    Route::post('releases/new', [\App\Http\Controllers\ReleaseController::class, 'store'])->name('app::releases.store');
    Route::get('release/{release}')->name('app::releases.show');
    Route::get('release/{release}/edit')->name('app::releases.edit');
    Route::post('release/{release}/edit')->name('app::releases.update');
    Route::delete('release/{release}')->name('app::releases.delete');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/{release:slug}', function (\App\Models\Release $release) {
    return Inertia::render('Release', [
        'release' => $release->load('artist')
    ]);
});
