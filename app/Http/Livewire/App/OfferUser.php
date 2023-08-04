<?php

namespace App\Http\Livewire\App;

use App\Events\ChatMessageSent;
use App\Models\Chat;
use App\Models\Offers;
use Livewire\Component;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class OfferUser extends Component
{
    public $offers;
    public $user_id;
    public $text;
    public $chats;
    public $alertSession = false;
    public $rules;

    protected $listeners = ['messageSent' => 'getMessages'];

    protected $pollingIntervalInSeconds = 1;

    public function mount(Offers $offers)
    {
        $this->user_id = Auth::user()->id;
        $this->offers = $offers;
        $this->getMessages();
    }
    public function render()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('profile-user')) {
            abort(403);
        }
        $this->chats = Chat::where('offer_id',$this->offers->id)
        ->where('status',1)
        ->orderBy('send_at','desc')->get();
        return view('livewire.app.offer-user');
    }
    public function sendMessage()
    {

        // $this->rules = [
        //     'text' => 'required|max:255',
        // ];

        // $this->validate();

        $chat = Chat::create([
            'demand_id' => $this->offers->demand->id,
            'offer_id'  => $this->offers->id,
            'user_id'   => Auth::user()->id,
            'text'      => $this->text,
            'send_to'   => $this->offers->user->id,
            'status'    => 1,
            'code'      => Str::uuid(),
            'send_at'   => date('Y-m-d H:i:s'),
        ]);

        ChatMessageSent::dispatch($chat);
        // event(new \App\Events\ChatMessageSent($chat));
        $this->reset(
            'text',
        );
        $this->chats = $this->offers->chat->sortBy('send_at');
    }
    public function getMessages()
    {
        // Lógica para obter as mensagens do banco de dados
        $this->chats = Chat::where('offer_id',$this->offers->id)
        ->where('status',1)
        ->orderBy('send_at','desc')->get();
    }
}
