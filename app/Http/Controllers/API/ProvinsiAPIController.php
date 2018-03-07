<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProvinsiAPIRequest;
use App\Http\Requests\API\UpdateProvinsiAPIRequest;
use App\Models\Provinsi;
use App\Repositories\ProvinsiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProvinsiController
 * @package App\Http\Controllers\API
 */

class ProvinsiAPIController extends AppBaseController
{
    /** @var  ProvinsiRepository */
    private $provinsiRepository;

    public function __construct(ProvinsiRepository $provinsiRepo)
    {
        $this->provinsiRepository = $provinsiRepo;
    }

    /**
     * Display a listing of the Provinsi.
     * GET|HEAD /provinsis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->provinsiRepository->pushCriteria(new RequestCriteria($request));
        $this->provinsiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $provinsis = $this->provinsiRepository->all();

        return $this->sendResponse($provinsis->toArray(), 'Provinsis retrieved successfully');
    }

    /**
     * Store a newly created Provinsi in storage.
     * POST /provinsis
     *
     * @param CreateProvinsiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProvinsiAPIRequest $request)
    {
        $input = $request->all();

        $provinsis = $this->provinsiRepository->create($input);

        return $this->sendResponse($provinsis->toArray(), 'Provinsi saved successfully');
    }

    /**
     * Display the specified Provinsi.
     * GET|HEAD /provinsis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Provinsi $provinsi */
        $provinsi = $this->provinsiRepository->findWithoutFail($id);

        if (empty($provinsi)) {
            return $this->sendError('Provinsi not found');
        }

        return $this->sendResponse($provinsi->toArray(), 'Provinsi retrieved successfully');
    }

    /**
     * Update the specified Provinsi in storage.
     * PUT/PATCH /provinsis/{id}
     *
     * @param  int $id
     * @param UpdateProvinsiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProvinsiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Provinsi $provinsi */
        $provinsi = $this->provinsiRepository->findWithoutFail($id);

        if (empty($provinsi)) {
            return $this->sendError('Provinsi not found');
        }

        $provinsi = $this->provinsiRepository->update($input, $id);

        return $this->sendResponse($provinsi->toArray(), 'Provinsi updated successfully');
    }

    /**
     * Remove the specified Provinsi from storage.
     * DELETE /provinsis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Provinsi $provinsi */
        $provinsi = $this->provinsiRepository->findWithoutFail($id);

        if (empty($provinsi)) {
            return $this->sendError('Provinsi not found');
        }

        $provinsi->delete();

        return $this->sendResponse($id, 'Provinsi deleted successfully');
    }
}
