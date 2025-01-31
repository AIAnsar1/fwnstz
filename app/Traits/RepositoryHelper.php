<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use App\Models\BaseModel;

trait RepositoryHelper
{
    protected Model $modelClass;

    /**
     * @param Model $modelClass
     */
    public function __construct(Model $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * @return Builder|BaseModel
     * @throws Throwable
     */
    protected function query(): Builder|BaseModel
    {
        /** @var Model $class */
        $query = $this->getBaseModel()->query();
        return $query->orderByDesc('id');
    }

    /**
     * @return Model
     * @throws Throwable
     */
    protected function getBaseModel(): Model
    {
        return $this->modelClass;
    }
}
