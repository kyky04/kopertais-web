<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRekomendasiAPIRequest;
use App\Http\Requests\API\UpdateRekomendasiAPIRequest;
use App\Models\Rekomendasi;
use App\Repositories\RekomendasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RekomendasiController
 * @package App\Http\Controllers\API
 */

class RekomendasiAPIController extends AppBaseController
{
    /** @var  RekomendasiRepository */
    private $rekomendasiRepository;

    public function __construct(RekomendasiRepository $rekomendasiRepo)
    {
        $this->rekomendasiRepository = $rekomendasiRepo;
    }

    /**
     * Display a listing of the Rekomendasi.
     * GET|HEAD /rekomendasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rekomendasiRepository->pushCriteria(new RequestCriteria($request));
        $this->rekomendasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rekomendasis = $this->rekomendasiRepository->with('universitas')->with('pegawai')->all();

        return $this->sendResponse($rekomendasis->toArray(), 'Rekomendasis retrieved successfully');
    }

    /**
     * Store a newly created Rekomendasi in storage.
     * POST /rekomendasis
     *
     * @param CreateRekomendasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRekomendasiAPIRequest $request)
    {
        $input = $request->all();

        $rekomendasis = $this->rekomendasiRepository->create($input);

        return $this->sendResponse($rekomendasis->toArray(), 'Rekomendasi saved successfully');
    }

    /**
     * Display the specified Rekomendasi.
     * GET|HEAD /rekomendasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Rekomendasi $rekomendasi */
        $rekomendasi = $this->rekomendasiRepository->findWithoutFail($id);

        if (empty($rekomendasi)) {
            return $this->sendError('Rekomendasi not found');
        }

        return $this->sendResponse($rekomendasi->toArray(), 'Rekomendasi retrieved successfully');
    }

    /**
     * Update the specified Rekomendasi in storage.
     * PUT/PATCH /rekomendasis/{id}
     *
     * @param  int $id
     * @param UpdateRekomendasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRekomendasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Rekomendasi $rekomendasi */
        $rekomendasi = $this->rekomendasiRepository->findWithoutFail($id);

        if (empty($rekomendasi)) {
            return $this->sendError('Rekomendasi not found');
        }

        $rekomendasi = $this->rekomendasiRepository->update($input, $id);

        return $this->sendResponse($rekomendasi->toArray(), 'Rekomendasi updated successfully');
    }

    /**
     * Remove the specified Rekomendasi from storage.
     * DELETE /rekomendasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Rekomendasi $rekomendasi */
        $rekomendasi = $this->rekomendasiRepository->findWithoutFail($id);

        if (empty($rekomendasi)) {
            return $this->sendError('Rekomendasi not found');
        }

        $rekomendasi->delete();

        return $this->sendResponse($id, 'Rekomendasi deleted successfully');
    }
}
