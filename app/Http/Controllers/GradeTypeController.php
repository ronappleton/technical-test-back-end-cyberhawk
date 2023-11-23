<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\GradeTypeResource;
use App\Models\GradeType;
use App\Contracts\GradeTypeService;

class GradeTypeController
{
    public function __construct(private readonly GradeTypeService $gradeTypeService)
    {
    }

    public function index()
    {
        return GradeTypeResource::collection($this->gradeTypeService->all());
    }

    public function show(int $gradeTypeId)
    {
        return GradeTypeResource::make($this->gradeTypeService->findById($gradeTypeId));
    }
}
