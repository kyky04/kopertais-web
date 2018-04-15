<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePerjalananDinasRequest;
use App\Http\Requests\UpdatePerjalananDinasRequest;
use App\Repositories\PerjalananDinasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PerjalananDinasController extends AppBaseController
{
    /** @var  PerjalananDinasRepository */
    private $perjalananDinasRepository;

    public function __construct(PerjalananDinasRepository $perjalananDinasRepo)
    {
        $this->perjalananDinasRepository = $perjalananDinasRepo;
    }

    /**
     * Display a listing of the PerjalananDinas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->perjalananDinasRepository->pushCriteria(new RequestCriteria($request));
        $perjalananDinas = $this->perjalananDinasRepository->all();

        return view('perjalanan_dinas.index')
            ->with('perjalananDinas', $perjalananDinas);
    }

    /**
     * Show the form for creating a new PerjalananDinas.
     *
     * @return Response
     */
    public function create()
    {
        return view('perjalanan_dinas.create');
    }

    /**
     * Store a newly created PerjalananDinas in storage.
     *
     * @param CreatePerjalananDinasRequest $request
     *
     * @return Response
     */
    public function store(CreatePerjalananDinasRequest $request)
    {
        $input = $request->all();

        $perjalananDinas = $this->perjalananDinasRepository->create($input);

        Flash::success('Perjalanan Dinas saved successfully.');

        return redirect(route('perjalananDinas.index'));
    }

    /**
     * Display the specified PerjalananDinas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perjalananDinas = $this->perjalananDinasRepository->findWithoutFail($id);

        if (empty($perjalananDinas)) {
            Flash::error('Perjalanan Dinas not found');

            return redirect(route('perjalananDinas.index'));
        }

        return view('perjalanan_dinas.show')->with('perjalananDinas', $perjalananDinas);
    }

    /**
     * Show the form for editing the specified PerjalananDinas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perjalananDinas = $this->perjalananDinasRepository->findWithoutFail($id);

        if (empty($perjalananDinas)) {
            Flash::error('Perjalanan Dinas not found');

            return redirect(route('perjalananDinas.index'));
        }

        return view('perjalanan_dinas.edit')->with('perjalananDinas', $perjalananDinas);
    }

    /**
     * Update the specified PerjalananDinas in storage.
     *
     * @param  int              $id
     * @param UpdatePerjalananDinasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerjalananDinasRequest $request)
    {
        $perjalananDinas = $this->perjalananDinasRepository->findWithoutFail($id);

        if (empty($perjalananDinas)) {
            Flash::error('Perjalanan Dinas not found');

            return redirect(route('perjalananDinas.index'));
        }

        $perjalananDinas = $this->perjalananDinasRepository->update($request->all(), $id);

        Flash::success('Perjalanan Dinas updated successfully.');

        return redirect(route('perjalananDinas.index'));
    }

    /**
     * Remove the specified PerjalananDinas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perjalananDinas = $this->perjalananDinasRepository->findWithoutFail($id);

        if (empty($perjalananDinas)) {
            Flash::error('Perjalanan Dinas not found');

            return redirect(route('perjalananDinas.index'));
        }

        $this->perjalananDinasRepository->delete($id);

        Flash::success('Perjalanan Dinas deleted successfully.');

        return redirect(route('perjalananDinas.index'));
    }
}
