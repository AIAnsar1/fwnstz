<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AdvertisementsResource;
use Throwable;
use App\Models\Advertisements;
use App\Services\AdvertisementsService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreAdvertisementsRequest;
use App\Http\Requests\UpdateRequest\UpdateAdvertisementsRequest;

class AdvertisementsController extends Controller
{
    /**
     * @var AdvertisementsService
     */
    private AdvertisementsService $service;

    /**
     * @param AdvertisementsService $service
     */
    public function __construct(AdvertisementsService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws Throwable
     */
    public function index(Request $request)
    {
        return AdvertisementsResource::collection( $this->service->paginatedList( $request->all() ) );
    }

    /**
     * @param StoreAdvertisementsRequest $request
     * @return array|Builder|Collection|Advertisements
     * @throws Throwable
     */
    public function store(StoreAdvertisementsRequest $request): array |Builder|Collection|Advertisements
    {
        return $this->service->createModel($request->validated());

    }

    /**
     * @param $advertisements_id
     * @return AdvertisementsResource
     * @throws Throwable
     */
    public function show(int $advertisements_id)
    {
        return new AdvertisementsResource( $this->service->getModelById( $advertisements_id ));
    }

    /**
     * @param UpdateAdvertisementsRequest $request
     * @param int $advertisements_id
     * @return array|Advertisements|Collection|Builder
     * @throws Throwable
     */
    public function update(UpdateAdvertisementsRequest $request, int $advertisements_id): array |Advertisements|Collection|Builder
    {
        return $this->service->updateModel($request->validated(), $advertisements_id);

    }

    /**
     * @param int $advertisements_id
     * @return array|Builder|Collection|Advertisements
     * @throws Throwable
     */
    public function destroy(int $advertisements_id): array |Builder|Collection|Advertisements
    {
        return $this->service->deleteModel($advertisements_id);
    }
}
