<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePerjalananAPIRequest;
use App\Http\Requests\API\UpdatePerjalananAPIRequest;
use App\Models\Perjalanan;
use App\Repositories\PerjalananRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PerjalananController
 * @package App\Http\Controllers\API
 */

class PerjalananAPIController extends AppBaseController
{
    /** @var  PerjalananRepository */
    private $perjalananRepository;

    public function __construct(PerjalananRepository $perjalananRepo)
    {
        $this->perjalananRepository = $perjalananRepo;
    }

    /**
     * Display a listing of the Perjalanan.
     * GET|HEAD /perjalanans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->perjalananRepository->pushCriteria(new RequestCriteria($request));
        $this->perjalananRepository->pushCriteria(new LimitOffsetCriteria($request));
        $perjalanans = $this->perjalananRepository->with('universitas')->all();

        return $this->sendResponse($perjalanans->toArray(), 'Perjalanans retrieved successfully');
    }

    /**
     * Store a newly created Perjalanan in storage.
     * POST /perjalanans
     *
     * @param CreatePerjalananAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePerjalananAPIRequest $request)
    {
        $input = $request->all();

        $perjalanans = $this->perjalananRepository->create($input);

        return $this->sendResponse($perjalanans->toArray(), 'Perjalanan saved successfully');
    }

    /**
     * Display the specified Perjalanan.
     * GET|HEAD /perjalanans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Perjalanan $perjalanan */
        $perjalanan = $this->perjalananRepository->findWithoutFail($id);

        if (empty($perjalanan)) {
            return $this->sendError('Perjalanan not found');
        }

        return $this->sendResponse($perjalanan->toArray(), 'Perjalanan retrieved successfully');
    }

    /**
     * Update the specified Perjalanan in storage.
     * PUT/PATCH /perjalanans/{id}
     *
     * @param  int $id
     * @param UpdatePerjalananAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerjalananAPIRequest $request)
    {
        $input = $request->all();

        /** @var Perjalanan $perjalanan */
        $perjalanan = $this->perjalananRepository->findWithoutFail($id);

        if (empty($perjalanan)) {
            return $this->sendError('Perjalanan not found');
        }

        $perjalanan = $this->perjalananRepository->update($input, $id);

        return $this->sendResponse($perjalanan->toArray(), 'Perjalanan updated successfully');
    }

    /**
     * Remove the specified Perjalanan from storage.
     * DELETE /perjalanans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Perjalanan $perjalanan */
        $perjalanan = $this->perjalananRepository->findWithoutFail($id);

        if (empty($perjalanan)) {
            return $this->sendError('Perjalanan not found');
        }

        $perjalanan->delete();

        return $this->sendResponse($id, 'Perjalanan deleted successfully');
    }
}
