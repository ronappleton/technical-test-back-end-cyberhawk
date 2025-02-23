<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\ComponentTypeService;
use App\Http\Resources\ComponentTypeResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ComponentTypeController extends Controller
{
    public function __construct(private readonly ComponentTypeService $componentTypeService)
    {
    }

    public function index(): ResourceCollection
    {
        return ComponentTypeResource::collection($this->componentTypeService->all());
    }

    public function show(int $componentType)
    {
        return ComponentTypeResource::make($this->componentTypeService->findById($componentType));
    }
}
