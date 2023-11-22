<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\TurbineService;
use App\Http\Resources\TurbineResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TurbineController
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
        return new TurbineResource($this->turbineService->findById($turbineId));
    }
}
