<?php

namespace App\Services;

use App\Repositories\AdvertisementsRepository;

class AdvertisementsService extends BaseService
{
    public function __construct(AdvertisementsRepository $repository)
    {
        $this->repository = $repository;
    }
}
