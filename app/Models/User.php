<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property-read int $id
 * @property string $username
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection $permissions
 * @property Collection $roles
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasRoles;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function getDefaultGuardName(): string
    {
        return 'sanctum';
    }
}
