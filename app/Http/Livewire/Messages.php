<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Message;

class Messages extends Component
{

    public $sender;
    public $message;

    public function render()
    {
        $users=User::all();
        $sender=$this->sender;
        return view('livewire.messages',compact('users','sender'));
    }
    
    public function getUser($userId)
    {
        $user=User::find($userId);
        $this->sender=$user;
    }

    public function SendMessage()
    {
        $data = new Message();
        $data->message = $this->message;
        $data->user_id = auth()->id();
        $data->receiver_id = $this->sender->id;
        $data->save();

        $this->message = '';
    }

}
