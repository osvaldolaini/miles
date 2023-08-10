<?php

use App\Http\Livewire\App\Accounts;
use App\Http\Livewire\App\Chats;
use App\Http\Livewire\App\Dashboard;
use App\Http\Livewire\App\Demand;
use App\Http\Livewire\App\DemandCheckout;
use App\Http\Livewire\App\DemandPassengers;
use App\Http\Livewire\App\DemandUser;
use App\Http\Livewire\App\MyDemandLike;
use App\Http\Livewire\App\OffersList;
use App\Http\Livewire\App\OffersListUser;
use App\Http\Livewire\App\OfferUser;
use Illuminate\Support\Facades\Route;
//Usuário
use App\Http\Livewire\App\UserProfile;
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

Route::get('/', function () {
    // return view('welcome');
    return view('livewire/homepage/welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/meus-dados', UserProfile::class)->name('profile.user');
    Route::get('/app', Dashboard::class)->name('app');
    Route::get('/fazer-pedido', Demand::class)->name('demand');
    Route::get('/fazer-pedido/passageiros', DemandPassengers::class)->name('demand.pass');
    Route::get('/negociar/{offers:code}', OfferUser::class)->name('offer.user');
    Route::get('/ofertas-do-pedido/{demand:code}', OffersList::class)->name('all.offers.demand');

    Route::get('/meus-pedido', DemandUser::class)->name('demand.user');
    Route::get('/meus-favoritos', MyDemandLike::class)->name('like.demand.user');
    Route::get('/minhas-ofertas', OffersListUser::class)->name('offer.list.user');
    Route::get('/minhas-contas', Accounts::class)->name('account.user');

    Route::get('/finalizar/{offers:code}', DemandCheckout::class)->name('demand.checkout');

    Route::get('/chats', Chats::class)->name('chats');
});
