<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Models\Turbine;
use App\Contracts\TurbineService as TurbineServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TurbineService extends DataService implements TurbineServiceContract
{
    protected string $model = Turbine::class;

    public function inspections(int $turbineId): Collection
    {
        return $this->findById($turbineId)->inspections;
    }

    public function inspection(int $turbineId, int $inspectionId): Model
    {
        return $this->inspections($turbineId)->firstWhere('id', $inspectionId);
    }
}
