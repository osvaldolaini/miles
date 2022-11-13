<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Str;

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
        'username'=> Str::slug($socialUser->name.uniqid(), '_'),
        'email' => $socialUser->email,
        'github_token' => $socialUser->token,
        'github_refresh_token' => $socialUser->refreshToken,
    ]);

    Auth::login($socialUser);

    return redirect('/app');
});

#endregion

Route::get('/', function () {
    return view('welcome');
});
Route::get('/termo-de-uso', 'SiteController@term')->name('term');
Route::get('/politica-de-privacidade', 'SiteController@politics')->name('politics');
// Route::post('/enviar-email', 'Admin\EmailController@store')->name('email.store');
// Route::post('/newsletter', 'Admin\SubscriberController@store')->name('subscriber.store');
// Route::resource('/views','Admin\ViewController')->names('view')->parameters(['views' => 'view']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

    /**Site */
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/app', 'AppController@index')->name('index');
    });
    /**Usuário */
    Route::group(['namespace' => 'Admin','middleware' => ['auth']], function () {
        Route::get('/demandas', 'DemandController@api')->name('api');

        Route::post('/editar-meu-cadastro', 'UserController@update')->name('update');
        Route::resource('/meu-cadastro','UserController')->names('user')->parameters(['meu-cadastro' => 'user']);
        Route::resource('/meus-pedidos','DemandController')->names('demand')->parameters(['meus-pedidos' => 'demand']);

    });
    // Ofertas
    Route::group(['namespace' => 'Admin','middleware' => ['auth']], function () {
        Route::get('/ofertas-para-demanda/{demand}', 'DemandController@offersToDemand')->name('offersToDemand');
        Route::resource('/minhas-ofertas','OfferController')->names('offer')->parameters(['minhas-ofertas' => 'offer']);

    });

require __DIR__.'/auth.php';
