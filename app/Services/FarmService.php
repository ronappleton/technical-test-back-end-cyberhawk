<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\DataService;
use App\Contracts\FarmService as FarmServiceContract;
use App\Models\Farm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class FarmService extends DataService implements FarmServiceContract
{
    protected string $model = Farm::class;
}
