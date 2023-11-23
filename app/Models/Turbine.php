<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property string $name
 * @property int $farm_id
 * @property float $lat
 * @property float $lng
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Farm $farm
 * @property Collection $inspections
 * @property Collection $components
 */
class Turbine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'farm_id',
        'lat',
        'lng',
    ];

    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
    ];

    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }

    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }
}
