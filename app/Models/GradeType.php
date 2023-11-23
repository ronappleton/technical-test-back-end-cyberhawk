<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class GradeType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function grades(): BelongsToMany
    {
        return $this->belongsToMany(Grade::class);
    }
}
