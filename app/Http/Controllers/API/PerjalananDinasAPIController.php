<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePerjalananDinasAPIRequest;
use App\Http\Requests\API\UpdatePerjalananDinasAPIRequest;
use App\Models\PerjalananDinas;
use App\Repositories\PerjalananDinasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PerjalananDinasController
 * @package App\Http\Controllers\API
 */

class PerjalananDinasAPIController extends AppBaseController
{
    /** @var  PerjalananDinasRepository */
    private $perjalananDinasRepository;

    public function __construct(PerjalananDinasRepository $perjalananDinasRepo)
    {
        $this->perjalananDinasRepository = $perjalananDinasRepo;
    }

    /**
     * Display a listing of the PerjalananDinas.
     * GET|HEAD /perjalananDinas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->perjalananDinasRepository->pushCriteria(new RequestCriteria($request));
        $this->perjalananDinasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $perjalananDinas = $this->perjalananDinasRepository->all();

        return $this->sendResponse($perjalananDinas->toArray(), 'Perjalanan Dinas retrieved successfully');
    }

    /**
     * Store a newly created PerjalananDinas in storage.
     * POST /perjalananDinas
     *
     * @param CreatePerjalananDinasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePerjalananDinasAPIRequest $request)
    {
        $input = $request->all();

        $perjalananDinas = $this->perjalananDinasRepository->create($input);

        return $this->sendResponse($perjalananDinas->toArray(), 'Perjalanan Dinas saved successfully');
    }

    /**
     * Display the specified PerjalananDinas.
     * GET|HEAD /perjalananDinas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PerjalananDinas $perjalananDinas */
        $perjalananDinas = $this->perjalananDinasRepository->findWithoutFail($id);

        if (empty($perjalananDinas)) {
            return $this->sendError('Perjalanan Dinas not found');
        }

        return $this->sendResponse($perjalananDinas->toArray(), 'Perjalanan Dinas retrieved successfully');
    }

    /**
     * Update the specified PerjalananDinas in storage.
     * PUT/PATCH /perjalananDinas/{id}
     *
     * @param  int $id
     * @param UpdatePerjalananDinasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerjalananDinasAPIRequest $request)
    {
        $input = $request->all();

        /** @var PerjalananDinas $perjalananDinas */
        $perjalananDinas = $this->perjalananDinasRepository->findWithoutFail($id);

        if (empty($perjalananDinas)) {
            return $this->sendError('Perjalanan Dinas not found');
        }

        $perjalananDinas = $this->perjalananDinasRepository->update($input, $id);

        return $this->sendResponse($perjalananDinas->toArray(), 'PerjalananDinas updated successfully');
    }

    /**
     * Remove the specified PerjalananDinas from storage.
     * DELETE /perjalananDinas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PerjalananDinas $perjalananDinas */
        $perjalananDinas = $this->perjalananDinasRepository->findWithoutFail($id);

        if (empty($perjalananDinas)) {
            return $this->sendError('Perjalanan Dinas not found');
        }

        $perjalananDinas->delete();

        return $this->sendResponse($id, 'Perjalanan Dinas deleted successfully');
    }
}
