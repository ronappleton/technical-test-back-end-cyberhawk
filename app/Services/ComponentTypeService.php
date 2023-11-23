<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Contracts\ComponentTypeService as ComponentTypeServiceContract;
use App\Models\ComponentType;

class ComponentTypeService extends DataService implements ComponentTypeServiceContract
{
    protected string $model = ComponentType::class;
}
