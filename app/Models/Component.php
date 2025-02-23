<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_type_id',
        'turbine_id',
    ];

    public function componentType(): BelongsTo
    {
        return $this->belongsTo(ComponentType::class);
    }

    public function turbine(): BelongsTo
    {
        return $this->belongsTo(Turbine::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
