<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePegawaiAPIRequest;
use App\Http\Requests\API\UpdatePegawaiAPIRequest;
use App\Models\Pegawai;
use App\Repositories\PegawaiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PegawaiController
 * @package App\Http\Controllers\API
 */

class PegawaiAPIController extends AppBaseController
{
    /** @var  PegawaiRepository */
    private $pegawaiRepository;

    public function __construct(PegawaiRepository $pegawaiRepo)
    {
        $this->pegawaiRepository = $pegawaiRepo;
    }

    /**
     * Display a listing of the Pegawai.
     * GET|HEAD /pegawais
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pegawaiRepository->pushCriteria(new RequestCriteria($request));
        $this->pegawaiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pegawais = $this->pegawaiRepository->all();

        return $this->sendResponse($pegawais->toArray(), 'Pegawais retrieved successfully');
    }

    /**
     * Store a newly created Pegawai in storage.
     * POST /pegawais
     *
     * @param CreatePegawaiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePegawaiAPIRequest $request)
    {
        $input = $request->all();

        $pegawais = $this->pegawaiRepository->create($input);

        return $this->sendResponse($pegawais->toArray(), 'Pegawai saved successfully');
    }

    /**
     * Display the specified Pegawai.
     * GET|HEAD /pegawais/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pegawai $pegawai */
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            return $this->sendError('Pegawai not found');
        }

        return $this->sendResponse($pegawai->toArray(), 'Pegawai retrieved successfully');
    }

    /**
     * Update the specified Pegawai in storage.
     * PUT/PATCH /pegawais/{id}
     *
     * @param  int $id
     * @param UpdatePegawaiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePegawaiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pegawai $pegawai */
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            return $this->sendError('Pegawai not found');
        }

        $pegawai = $this->pegawaiRepository->update($input, $id);

        return $this->sendResponse($pegawai->toArray(), 'Pegawai updated successfully');
    }

    /**
     * Remove the specified Pegawai from storage.
     * DELETE /pegawais/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pegawai $pegawai */
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            return $this->sendError('Pegawai not found');
        }

        $pegawai->delete();

        return $this->sendResponse($id, 'Pegawai deleted successfully');
    }
}
