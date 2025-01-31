<?php

namespace App\Traits;

use Throwable;
use App\Repositories\BaseRepository;

trait ServiceHelper
{
    /**
     * @return BaseRepository
     * @throws Throwable
     */
    protected function getRepository(): BaseRepository
    {
        throw_if(!$this->repository, get_class($this) . ' repository property not implemented');
        return $this->repository;
    }
}
