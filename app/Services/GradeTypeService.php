<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Contracts\GradeTypeService as GradeTypeServiceContract;
use App\Models\GradeType;

class GradeTypeService extends DataService implements GradeTypeServiceContract
{
    protected string $model = GradeType::class;
}
