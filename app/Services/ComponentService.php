<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Contracts\ComponentService as ComponentServiceContract;
use App\Models\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ComponentService extends DataService implements ComponentServiceContract
{
    protected string $model = Component::class;

    public function grades(int $componentId): Collection
    {
        return $this->findById($componentId)->grades;
    }

    public function grade(int $componentId, int $gradeId): Model
    {
        return $this->grades($componentId)->firstWhere('id', $gradeId);
    }
}
