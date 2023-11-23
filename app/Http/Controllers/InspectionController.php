<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\InspectionResource;
use App\Contracts\InspectionService;
use Illuminate\Routing\Controller;

class InspectionController extends Controller
{
    public function __construct(private readonly InspectionService $inspectionService)
    {
    }

    public function index()
    {
        return InspectionResource::collection($this->inspectionService->all());
    }

    public function show(int $inspectionId)
    {
        return InspectionResource::make($this->inspectionService->findById($inspectionId));
    }
}
