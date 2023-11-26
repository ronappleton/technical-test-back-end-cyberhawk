<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\FarmService;
use App\Http\Resources\FarmResource;
use App\Http\Resources\TurbineResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FarmController extends Controller
{
    public function __construct(private readonly FarmService $farmService)
    {
    }

    public function index(): ResourceCollection
    {
        return FarmResource::collection($this->farmService->all());
    }

    public function show(int $farmId): JsonResource
    {
        return FarmResource::make($this->farmService->findById($farmId));
    }

    public function turbines(int $farmId): ResourceCollection
    {
        return TurbineResource::collection($this->farmService->findById($farmId)->turbines);
    }

    public function turbine(int $farmId, int $turbineId): JsonResource
    {
        return TurbineResource::make($this->farmService->turbine($farmId, $turbineId));
    }
}
