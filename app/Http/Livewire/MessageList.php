<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class MessageList extends Component
{
    use WithPagination;

    public function mount()
    {

    }

    public function render()
    {
        $chattedWithUsers = User::addSelect([
                'users.*',
                DB::raw("(SELECT message FROM messages WHERE id = latest_messages.message_id) as message"),
                'latest_messages.last_message_at',
                'latest_messages.last_message_status',
            ])
            ->join(DB::raw("(
                    SELECT
                        MAX(id) as message_id,
                        MAX(created_at) as last_message_at,
                        to_user_id,
                        from_user_id,
                        message_status_id,
                        (SELECT code FROM message_statuses WHERE id = MAX(messages.message_status_id)) as last_message_status

                    FROM messages

                    WHERE messages.from_user_id = ".auth()->id()."

                    GROUP BY to_user_id
                )

                as latest_messages"), function($join) {
                $join->on("latest_messages.to_user_id", "=", "users.id")
                    ->where('latest_messages.from_user_id', '=', auth()->id());
            })
            ->where('latest_messages.from_user_id', '=', auth()->id())
            ->groupBy('latest_messages.to_user_id')
            ->latest('latest_messages.last_message_at', 'DESC')

            ->paginate(10);


        return view('livewire.message-list')->with([
            'chattedWith' => $chattedWithUsers,
        ]);
    }

}
