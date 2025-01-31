<?php

namespace App\Repositories;


use App\Constants\PaginatorPerPage;
use App\Contracts\IBaseRepository;
use App\Models\BaseModel;
use App\Traits\RepositoryHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Throwable;

abstract class BaseRepository implements IBaseRepository
{
    use RepositoryHelper;
    /**
     * @param array $data
     * @param array|string|null $with
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function paginatedList(array $data, array|string $with = null): LengthAwarePaginator
    {
        $query = $this->query();

        if (method_exists($this->getBaseModel(), 'scopeFilter'))
        {
            $query->filter($data);
        }

        if (!is_null($with))
        {
            $query->with($with);
        }
        return $query->paginate(PaginatorPerPage::PER_PAGE);
    }

    /**
     * @param array $data
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function create(array $data): Model|array|Collection|Builder|BaseModel|null
    {
        $model = $this->getBaseModel();
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param array $data
     * @param int $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function update( array $data, int $id ): Model|array|Collection|Builder|BaseModel|null
    {
        $model = $this->findById($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param int $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function findById( int $id ): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getBaseModel()::query()->findOrFail($id);
    }

    /**
     * @param int $id
     * @return bool
     * @throws Throwable
     */
    public function delete( int $id ): bool
    {
        $model = $this->findById($id);
        return $model->delete();
    }
}
