<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'awarded_bids',
        'price',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
