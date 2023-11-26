<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\GradeResource;
use App\Http\Resources\InspectionResource;
use App\Contracts\InspectionService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InspectionController extends Controller
{
    public function __construct(private readonly InspectionService $inspectionService)
    {
    }

    public function index(): ResourceCollection
    {
        return InspectionResource::collection($this->inspectionService->all());
    }

    public function show(int $inspectionId): JsonResource
    {
        return InspectionResource::make($this->inspectionService->findById($inspectionId));
    }

    public function grades(int $inspectionId): ResourceCollection
    {
        return GradeResource::collection($this->inspectionService->grades($inspectionId));
    }

    public function grade(int $inspectionId, int $gradeId): JsonResource
    {
        return GradeResource::make($this->inspectionService->grade($inspectionId, $gradeId));
    }
}
