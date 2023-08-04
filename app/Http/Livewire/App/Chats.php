<?php

namespace App\Http\Livewire\App;

use App\Models\Chat;
use App\Models\Offers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chats extends Component
{
    public $user_id;

    public function render()
    {
        $listChats=array();
        $offers = Chat::select('offer_id')->orderBy('id','desc')
        ->where('status',1)
        ->where('user_id',Auth::user()->id)
        ->orWhere('send_to',Auth::user()->id)
        ->pluck('offer_id')->toArray();
        $offers = array_unique($offers);
        // dd($offers);
        foreach ($offers as $key => $value) {
            // dd($value);
            $chat = Chat::where('offer_id',$value)
            ->orderBy('send_at','desc')
            ->first();
            if ($chat) {
                $listChats[] = $chat;
            }
        }

        // dd($listChats);
        // $this->user_id = Auth::user()->id;
        // foreach ($chats as $key => $value) {
        //     foreach ($value->take(1) as $chat) {
        //         $listChats[] = $chat;
        //     }
        // }
        return view('livewire.app.chats',[
            'listChats' => $listChats
        ]);
    }

}
