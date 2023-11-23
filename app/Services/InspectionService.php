<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\InspectionService as InspectionServiceContract;
use App\Abstracts\DataService;
use App\Models\Inspection;

class InspectionService extends DataService implements InspectionServiceContract
{
    protected string $model = Inspection::class;
}
