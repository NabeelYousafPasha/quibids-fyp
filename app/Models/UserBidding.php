<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBidding extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'auction_id',
        'offered_price',
        'won_at'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
}
