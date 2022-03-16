<?php

namespace App\Models;

use App\Models\Traits\Attribute\RoleAttribute;
use App\Models\Traits\Method\RoleMethod;
use App\Models\Traits\Scope\RoleScope;
use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory,
        RoleAttribute,
        RoleMethod,
        RoleScope;

    protected $with = [
        'permissions',
    ];

    protected static function newFactory()
    {
        return RoleFactory::new();
    }
}
