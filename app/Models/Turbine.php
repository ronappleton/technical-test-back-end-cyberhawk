<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property string $name
 * @property int $farm_id
 * @property float $lat
 * @property float $lng
 * @property Carbon $created_at
 * @property Carbon $updated_at
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
}
