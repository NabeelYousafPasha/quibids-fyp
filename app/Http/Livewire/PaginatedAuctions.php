<?php

namespace App\Http\Livewire;

use App\Models\Auction;
use Livewire\Component;
use Livewire\WithPagination;

class PaginatedAuctions extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $allPublishedAuctions = Auction::addSelect('*')
        ->expiryTimeInSeconds()
        ->OfPublished()
        ->NotExpired()
        ->with('media')
        ->paginate(4);

        return view('livewire.paginated-auctions')->with([
        'allPublishedAuctions' => $allPublishedAuctions
        ]);
    }
}
