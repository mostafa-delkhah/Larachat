<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Messages extends Component
{

    public $sender;

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

}
