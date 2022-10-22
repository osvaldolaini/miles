<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
#region Socialite
Route::get('/login/{driver}/redirect', function ($driver) {
    return Socialite::driver($driver)->redirect();
})->name('auth.social.redirect');

Route::get('/auth/callback', function ($driver) {
    $socialUser=Socialite::driver($driver)->stateless->user();
    $socialUser = User::updateOrCreate([
        'email' => $socialUser->email,
    ], [
        'name' => $socialUser->name,
        'email' => $socialUser->email,
        'github_token' => $socialUser->token,
        'github_refresh_token' => $socialUser->refreshToken,
    ]);

    Auth::login($socialUser);

    return redirect('/dashboard');
});

#endregion

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
