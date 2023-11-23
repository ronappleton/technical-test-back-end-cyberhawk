<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\ComponentService;
use App\Http\Resources\ComponentResource;
use App\Models\Component;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ComponentController
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
}
