<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    // roles
    const ADMIN = 'admin';
    const VENDOR = 'vendor';
    const USER = 'user';

    /**
     * @return string[]
     */
    public static function getRoles()
    {
        return [
            self::ADMIN,
            self::VENDOR,
            self::USER,
        ];
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeExceptAdmin($query)
    {
        return $query->whereNotIn('roles.name', [
            self::ADMIN,
        ]);
    }
}
