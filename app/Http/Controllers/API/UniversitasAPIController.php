<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversitasAPIRequest;
use App\Http\Requests\API\UpdateUniversitasAPIRequest;
use App\Models\Universitas;
use App\Repositories\UniversitasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UniversitasController
 * @package App\Http\Controllers\API
 */

class UniversitasAPIController extends AppBaseController
{
    /** @var  UniversitasRepository */
    private $universitasRepository;

    public function __construct(UniversitasRepository $universitasRepo)
    {
        $this->universitasRepository = $universitasRepo;
    }

    /**
     * Display a listing of the Universitas.
     * GET|HEAD /universitas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->universitasRepository->pushCriteria(new RequestCriteria($request));
        $this->universitasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $universitas = $this->universitasRepository->with('kota')->all();

        return $this->sendResponse($universitas->toArray(), 'Universitas retrieved successfully');
    }

    /**
     * Store a newly created Universitas in storage.
     * POST /universitas
     *
     * @param CreateUniversitasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversitasAPIRequest $request)
    {
        $input = $request->all();

        $universitas = $this->universitasRepository->create($input);

        return $this->sendResponse($universitas->toArray(), 'Universitas saved successfully');
    }

    /**
     * Display the specified Universitas.
     * GET|HEAD /universitas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Universitas $universitas */
        $universitas = $this->universitasRepository->findWithoutFail($id);

        if (empty($universitas)) {
            return $this->sendError('Universitas not found');
        }

        return $this->sendResponse($universitas->toArray(), 'Universitas retrieved successfully');
    }

    /**
     * Update the specified Universitas in storage.
     * PUT/PATCH /universitas/{id}
     *
     * @param  int $id
     * @param UpdateUniversitasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversitasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Universitas $universitas */
        $universitas = $this->universitasRepository->findWithoutFail($id);

        if (empty($universitas)) {
            return $this->sendError('Universitas not found');
        }

        $universitas = $this->universitasRepository->update($input, $id);

        return $this->sendResponse($universitas->toArray(), 'Universitas updated successfully');
    }

    /**
     * Remove the specified Universitas from storage.
     * DELETE /universitas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Universitas $universitas */
        $universitas = $this->universitasRepository->findWithoutFail($id);

        if (empty($universitas)) {
            return $this->sendError('Universitas not found');
        }

        $universitas->delete();

        return $this->sendResponse($id, 'Universitas deleted successfully');
    }
}
