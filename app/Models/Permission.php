<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    // actions
    const CREATE = 'create';
    const VIEW = 'view';
    const UPDATE = 'update';
    const DELETE = 'delete';

    /**
     * @return string[]
     */
    public static function getActions()
    {
        return [
            self::CREATE,
            self::VIEW,
            self::UPDATE,
            self::DELETE
        ];
    }
}
