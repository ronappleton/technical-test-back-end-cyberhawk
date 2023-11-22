<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\FarmService;
use App\Http\Resources\FarmResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FarmController
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
        return new FarmResource($this->farmService->findById($farmId));
    }
}
