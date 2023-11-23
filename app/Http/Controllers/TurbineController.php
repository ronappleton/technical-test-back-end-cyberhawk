<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\TurbineService;
use App\Http\Resources\ComponentResource;
use App\Http\Resources\InspectionResource;
use App\Http\Resources\TurbineResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;

class TurbineController extends Controller
{
    public function __construct(private readonly TurbineService $turbineService)
    {
    }

    public function index(): ResourceCollection
    {
        return TurbineResource::collection($this->turbineService->all());
    }

    public function show(int $turbineId): JsonResource
    {
        return TurbineResource::make($this->turbineService->findById($turbineId));
    }

    public function inspections(int $turbineId): ResourceCollection
    {
        return InspectionResource::collection($this->turbineService->inspections($turbineId));
    }

    public function inspection(int $turbineId, int $inspectionId): JsonResource
    {
        return InspectionResource::make($this->turbineService->inspection($turbineId, $inspectionId));
    }

    public function components(int $turbineId): ResourceCollection
    {
        return ComponentResource::collection($this->turbineService->components($turbineId));
    }

    public function component(int $turbineId, int $componentId): JsonResource
    {
        return ComponentResource::make($this->turbineService->component($turbineId, $componentId));
    }
}
