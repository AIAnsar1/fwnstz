<?php

namespace App\Repositories;

use App\Models\Advertisements;

class AdvertisementsRepository extends BaseRepository
{
    public function __construct(Advertisements $model)
    {
        parent::__construct($model);
    }
}
