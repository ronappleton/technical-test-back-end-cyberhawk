<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Contracts\ComponentService as ComponentServiceContract;
use App\Models\Component;

class ComponentService extends DataService implements ComponentServiceContract
{
    protected string $model = Component::class;
}
