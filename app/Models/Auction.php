<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'estimated_price',
        'estimated_expired_at',
        'actual_expired_at',
    ];

    protected $dates = [
        'estimated_expired_at',
        'actual_expired_at',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
