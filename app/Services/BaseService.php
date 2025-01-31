<?php

namespace App\Services;


use App\Contracts\IBaseService;
use App\Models\BaseModel;
use App\Repositories\BaseRepository;
use App\Traits\ServiceHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Throwable;

abstract class BaseService implements IBaseService
{
    use ServiceHelper;

    protected ?BaseRepository $repository = null;
    /**
     * @param array $data
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function paginatedList(array $data = []): LengthAwarePaginator
    {
        return $this->repository->paginatedList($data);
    }

    /**
     * @param $data
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function createModel($data): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getRepository()->create($data);
    }

    /**
     * @param $data
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function updateModel($data, $id): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getRepository()->update($data, $id);
    }

    /**
     * @param $id
     * @return bool
     * @throws Throwable
     */
    public function deleteModel($id): bool
    {
        return $this->getRepository()->delete($id);
    }

    /**
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function getModelById($id): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getRepository()->findById($id);
    }
}
