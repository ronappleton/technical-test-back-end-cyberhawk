<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property int $turbine_id
 * @property Carbon $inspected_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Turbine $turbine
 * @property Collection $components
 */
class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'turbine_id',
        'inspected_at',
    ];

    protected $casts = [
        'inspected_at' => 'datetime',
    ];

    public function turbine(): BelongsTo
    {
        return $this->belongsTo(Turbine::class);
    }

    public function components(): HasManyThrough
    {
        return $this->hasManyThrough(Component::class, Grade::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
