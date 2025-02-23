<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ComponentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }
}
