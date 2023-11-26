<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\GradeTypeResource;
use App\Contracts\GradeTypeService;

class GradeTypeController extends Controller
{
    public function __construct(private readonly GradeTypeService $gradeTypeService)
    {
    }

    public function index()
    {
        return GradeTypeResource::collection($this->gradeTypeService->all());
    }

    public function show(int $gradeType)
    {
        return GradeTypeResource::make($this->gradeTypeService->findById($gradeType));
    }
}
