<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\ComponentService;
use App\Http\Resources\ComponentResource;
use App\Http\Resources\GradeResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ComponentController extends Controller
{
    public function __construct(private readonly ComponentService $componentService)
    {
    }

    public function index(): ResourceCollection
    {
        return ComponentResource::collection($this->componentService->all());
    }

    public function show(int $componentId): JsonResource
    {
        return ComponentResource::make($this->componentService->findById($componentId));
    }

    public function grades(int $componentId): ResourceCollection
    {
        return GradeResource::collection($this->componentService->grades($componentId));
    }

    public function grade(int $componentId, int $gradeId): JsonResource
    {
        return GradeResource::make($this->componentService->grade($componentId, $gradeId));
    }
}
