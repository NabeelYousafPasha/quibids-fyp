<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MessageStatus;
use App\Models\User;

class Chat extends Component
{

    use WithPagination;

    public $recipient;
    public $messageStatus;
    public $message;

    public $response;

    public function mount(User $recipient)
    {
        $this->recipient = $recipient;
        $this->messageStatus = MessageStatus::where('code', '=', MessageStatus::SEEN)->first();
    }

    public function render()
    {
        // mark messages from recipient user to auth as SEEN
        // messagesFromRecipientToAuth
        Message::where('to_user_id', '=', auth()->id())
                ->where('from_user_id', '=', $this->recipient->id)
                ->update([
                    'message_status_id'=> $this->messageStatus->id
                ]);

        // messagesToRecipientFromAuth
        $messagesToRecipientFromAuth = Message::where('from_user_id', '=', auth()->id())
                ->where('to_user_id', '=', $this->recipient->id)
                ->latest('id', 'DESC');

        return view('livewire.chat', [
            'chatMessages' => $messagesToRecipientFromAuth->paginate(1),
        ]);
    }


    public function sendMessage()
    {
        if (! is_null($this->message)) {

            Message::create([
                'from_user_id' => auth()->id(),
                'to_user_id' => $this->recipient->id,
                'message' => $this->message,
                'message_status_id' => 2,
            ]);

            // reset message field
            $this->reset('message');
        }
    }

}
