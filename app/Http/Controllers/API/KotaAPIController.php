<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKotaAPIRequest;
use App\Http\Requests\API\UpdateKotaAPIRequest;
use App\Models\Kota;
use App\Repositories\KotaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KotaController
 * @package App\Http\Controllers\API
 */

class KotaAPIController extends AppBaseController
{
    /** @var  KotaRepository */
    private $kotaRepository;

    public function __construct(KotaRepository $kotaRepo)
    {
        $this->kotaRepository = $kotaRepo;
    }

    /**
     * Display a listing of the Kota.
     * GET|HEAD /kotas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kotaRepository->pushCriteria(new RequestCriteria($request));
        $this->kotaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kotas = $this->kotaRepository->all();

        return $this->sendResponse($kotas->toArray(), 'Kotas retrieved successfully');
    }

    /**
     * Store a newly created Kota in storage.
     * POST /kotas
     *
     * @param CreateKotaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKotaAPIRequest $request)
    {
        $input = $request->all();

        $kotas = $this->kotaRepository->create($input);

        return $this->sendResponse($kotas->toArray(), 'Kota saved successfully');
    }

    /**
     * Display the specified Kota.
     * GET|HEAD /kotas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kota $kota */
        $kota = $this->kotaRepository->findWithoutFail($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        return $this->sendResponse($kota->toArray(), 'Kota retrieved successfully');
    }

    /**
     * Update the specified Kota in storage.
     * PUT/PATCH /kotas/{id}
     *
     * @param  int $id
     * @param UpdateKotaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKotaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kota $kota */
        $kota = $this->kotaRepository->findWithoutFail($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        $kota = $this->kotaRepository->update($input, $id);

        return $this->sendResponse($kota->toArray(), 'Kota updated successfully');
    }

    /**
     * Remove the specified Kota from storage.
     * DELETE /kotas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kota $kota */
        $kota = $this->kotaRepository->findWithoutFail($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        $kota->delete();

        return $this->sendResponse($id, 'Kota deleted successfully');
    }
}
