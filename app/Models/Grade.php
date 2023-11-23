<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property int inspection_id
 * @property int component_id
 * @property int grade_type_id
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Inspection $inspection
 * @property Component $component
 * @property GradeType $gradeType
 */
class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'component_id',
        'grade_type_id',
    ];

    public function inspection(): BelongsTo
    {
        return $this->belongsTo(Inspection::class);
    }

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }

    public function gradeType(): BelongsTo
    {
        return $this->belongsTo(GradeType::class);
    }
}
