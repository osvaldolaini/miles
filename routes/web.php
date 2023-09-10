<?php

use App\Http\Livewire\App\AccountPassengers;
use App\Http\Livewire\App\Accounts;
use App\Http\Livewire\App\Chats;
use App\Http\Livewire\App\Dashboard;
use App\Http\Livewire\App\Demand;
use App\Http\Livewire\App\DemandCheckout;
use App\Http\Livewire\App\DemandListFilters;
use App\Http\Livewire\App\DemandNotification;
use App\Http\Livewire\App\DemandPassengers;
use App\Http\Livewire\App\DemandUser;
use App\Http\Livewire\App\DemandView;
use App\Http\Livewire\App\MyDemandLike;
use App\Http\Livewire\App\OffersList;
use App\Http\Livewire\App\OffersListUser;
use App\Http\Livewire\App\OfferUser;
use App\Http\Livewire\App\UserBio;
use Illuminate\Support\Facades\Route;
//Usuário
use App\Http\Livewire\App\UserProfile;
use App\Http\Livewire\Homepage\PrivacyPolicy;
use App\Http\Livewire\Homepage\TermsOfUse;

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
Route::get('/politica-de-privacidade', function () {
    // return view('welcome');
    return view('livewire/homepage/privacy-policy');

});
Route::get('/explore', function () {
    // return view('welcome');
    return view('livewire/homepage/explore');

});
Route::get('/duvidas-frequentes', function () {
    // return view('welcome');
    return view('livewire/homepage/faqs');

});
Route::get('/termo-de-uso', function () {
    // return view('welcome');
    return view('livewire/homepage/terms-of-use');

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
    Route::get('/passageiros-vinculados-a-conta/{account:code}', AccountPassengers::class)->name('account.passengers');

    Route::get('/finalizar/{offers:code}', DemandCheckout::class)->name('demand.checkout');

    Route::get('/perfil-do-usuario/{user:username}', UserBio::class)->name('user.bio');

    Route::get('/chats', Chats::class)->name('chats');
    Route::get('/notificações', DemandNotification::class)->name('demand.alerts');

    Route::get('/pedido-de-milhas/{demand:code}', DemandView::class)->name('demand.view');

    Route::get('/balcao-com-filtros', DemandListFilters::class)->name('filters');
});
