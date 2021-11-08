<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Facades\DB;

class Auction extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_published',
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

    /**
     * Accessors
     */
    public function getEstimatedExpireAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getAvailabilityAttribute()
    {
        return $this->sold_at ? 'SOLD' : 'AVAILABLE';
    }

    public function getStatusAttribute()
    {
        return $this->is_published ? 'PUBLISHED' : 'DRAFT';
    }

    /**
     * Scopes
     */
    public function scopeOfPublished($query)
    {
        return $query->where('is_published', '=', 1);
    }

    public function scopeOfDraft($query)
    {
        return $query->where('is_published', '=', 0);
    }

    public function scopeExpiryTimeInSeconds($query)
    {
        $query = $query->addSelect([
            DB::raw("(SELECT TIMESTAMPDIFF(SECOND, CONCAT(CURRENT_DATE(), ' ', CURRENT_TIME()), estimated_expire_at)) as left_expiry_time"),
        ]);

        return $query;
    }

    public function scopeNotExpired($query)
    {
        //  expiry is greater than curren time
        return $query->whereRaw("NOW() <= estimated_expire_at");
    }
}
