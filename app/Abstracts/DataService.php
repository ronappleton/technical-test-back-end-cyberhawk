<?php

declare(strict_types=1);

namespace App\Abstracts;

use App\Exceptions\DataServiceModelNotSet;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;
use App\Contracts\DataService as DataServiceContract;

abstract class DataService implements DataServiceContract
{
    use AuthorizesRequests;

    protected string $model;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if (!isset($this->model)) {
            throw new DataServiceModelNotSet($this);
        }
    }

    /**
     * @return class-string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    public function findById(int $id): Model
    {
        $model = $this->getModel()::findOrFail($id);

        $this->authorize('view', $model);

        return $model;
    }

    public function all(): ?Collection
    {
        $this->authorize('viewAny', $this->getModel());

        return $this->getModel()::all();
    }
}
