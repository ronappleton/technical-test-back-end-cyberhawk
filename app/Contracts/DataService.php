<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface DataService
{
    public function getModel(): string;

    public function findById(int $id): ?Model;

    public function all(): ?Collection;
}
