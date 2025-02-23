<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\GradeService;
use App\Http\Resources\GradeResource;

class GradeController extends Controller
{
    public function __construct(private readonly GradeService $gradeService)
    {
    }

    public function index()
    {
        return GradeResource::collection($this->gradeService->all());
    }

    public function show(int $gradeId): GradeResource
    {
        return GradeResource::make($this->gradeService->findById($gradeId));
    }
}
