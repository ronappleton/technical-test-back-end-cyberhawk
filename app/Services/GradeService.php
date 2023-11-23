<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Contracts\GradeService as GradeServiceContract;
use App\Models\Grade;

class GradeService extends DataService implements GradeServiceContract
{
    protected string $model = Grade::class;
}
