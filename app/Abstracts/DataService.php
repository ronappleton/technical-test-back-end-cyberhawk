<?php

declare(strict_types=1);

namespace App\Abstracts;

use App\Exceptions\DataServiceModelNotSet;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Contracts\DataService as DataServiceContract;

abstract class DataService implements DataServiceContract
{
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
        return $this->getModel()::findOrFail($id);
    }

    public function all(): ?Collection
    {
        return $this->getModel()::all();
    }
}
