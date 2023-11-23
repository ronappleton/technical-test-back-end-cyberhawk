<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection $turbines
 */
class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function turbines(): HasMany
    {
        return $this->hasMany(Turbine::class);
    }
}
