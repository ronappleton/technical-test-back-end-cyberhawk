<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\FarmService;
use App\Http\Resources\FarmResource;
use App\Models\Farm;

class FarmController
{
    public function __construct(private readonly FarmService $farmService)
    {
    }

    public function index()
    {
        return FarmResource::collection($this->farmService->all());
    }

    public function show(int $farmId)
    {
        return new FarmResource($this->farmService->findById($farmId));
    }
}
