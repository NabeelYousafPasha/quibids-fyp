<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Auction extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'estimated_price',
        'estimated_expire_at',
        'sold_at',
    ];

    protected $dates = [
        'estimated_expire_at',
        'sold_at',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function getEstimatedExpireAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
