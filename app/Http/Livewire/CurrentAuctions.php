<?php

namespace App\Http\Livewire;

use App\Models\Auction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CurrentAuctions extends Component
{
    public function render()
    {        
        $publishedAuctions = Auction::addSelect('*')
            ->expiryTimeInSeconds()
            ->OfPublished()
            ->NotExpired()
            ->limit(4)
            ->with('media')->get();
        return view('livewire.current-auctions')->with([
            'publishedAuctions' => $publishedAuctions
        ]);
    }
}
