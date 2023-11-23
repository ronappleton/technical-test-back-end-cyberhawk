<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\InspectionService as InspectionServiceContract;
use App\Abstracts\DataService;
use App\Models\Inspection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class InspectionService extends DataService implements InspectionServiceContract
{
    protected string $model = Inspection::class;

    public function grades(int $inspectionId): Collection
    {
        return $this->findById($inspectionId)->grades;
    }

    public function grade(int $inspectionId, int $gradeId): Model
    {
        return $this->grades($inspectionId)->firstWhere('id', $gradeId);
    }
}
