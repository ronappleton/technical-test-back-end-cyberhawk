<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Models\Turbine;
use App\Contracts\TurbineService as TurbineServiceContract;

class TurbineService extends DataService implements TurbineServiceContract
{
    protected string $model = Turbine::class;
}
