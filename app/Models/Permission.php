<?php

namespace App\Models;

use App\Models\Traits\Relationship\PermissionRelationship;
use App\Models\Traits\Scope\PermissionScope;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use PermissionRelationship;
    use PermissionScope;
}
