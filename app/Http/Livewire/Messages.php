<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Message;

class Messages extends Component
{

    public $sender;
    public $message;
    public $allmessages;

    public function render()
    {
        $users=User::all();
        $sender=$this->sender;
        $this->allmessages;
        return view('livewire.messages',compact('users','sender'));
    }

    public function dataMount()
    {
        if(isset($this->sender->id))
        {
            $this->allmessages=Message::where('user_id',auth()->id())
                                        ->where('receiver_id',$this->sender->id)
                                        ->orWhere('user_id',$this->sender->id)
                                        ->where('receiver_id',auth()->id())
                                        ->orderby('id','desc')
                                        ->get();

                                        $unread = Message::where('user_id',$this->sender->id)
                                        ->where('receiver_id',auth()->id());
                                        $unread->update(['is_seen'=>true]);
        }
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
    
    public function getUser($userId)
    {
        $user=User::find($userId);
        $this->sender=$user;
        $this->allmessages=Message::where('user_id',auth()->id())
                                    ->where('receiver_id',$userId)
                                    ->orWhere('user_id',$userId)
                                    ->where('receiver_id',auth()->id())
                                    ->orderby('id','desc')
                                    ->get();
    }

}
