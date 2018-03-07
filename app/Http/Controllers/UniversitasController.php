<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUniversitasRequest;
use App\Http\Requests\UpdateUniversitasRequest;
use App\Repositories\UniversitasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UniversitasController extends AppBaseController
{
    /** @var  UniversitasRepository */
    private $universitasRepository;

    public function __construct(UniversitasRepository $universitasRepo)
    {
        $this->universitasRepository = $universitasRepo;
    }

    /**
     * Display a listing of the Universitas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->universitasRepository->pushCriteria(new RequestCriteria($request));
        $universitas = $this->universitasRepository->all();

        return view('universitas.index')
            ->with('universitas', $universitas);
    }

    /**
     * Show the form for creating a new Universitas.
     *
     * @return Response
     */
    public function create()
    {
        return view('universitas.create');
    }

    /**
     * Store a newly created Universitas in storage.
     *
     * @param CreateUniversitasRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversitasRequest $request)
    {
        $input = $request->all();

        $universitas = $this->universitasRepository->create($input);

        Flash::success('Universitas saved successfully.');

        return redirect(route('universitas.index'));
    }

    /**
     * Display the specified Universitas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $universitas = $this->universitasRepository->findWithoutFail($id);

        if (empty($universitas)) {
            Flash::error('Universitas not found');

            return redirect(route('universitas.index'));
        }

        return view('universitas.show')->with('universitas', $universitas);
    }

    /**
     * Show the form for editing the specified Universitas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $universitas = $this->universitasRepository->findWithoutFail($id);

        if (empty($universitas)) {
            Flash::error('Universitas not found');

            return redirect(route('universitas.index'));
        }

        return view('universitas.edit')->with('universitas', $universitas);
    }

    /**
     * Update the specified Universitas in storage.
     *
     * @param  int              $id
     * @param UpdateUniversitasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversitasRequest $request)
    {
        $universitas = $this->universitasRepository->findWithoutFail($id);

        if (empty($universitas)) {
            Flash::error('Universitas not found');

            return redirect(route('universitas.index'));
        }

        $universitas = $this->universitasRepository->update($request->all(), $id);

        Flash::success('Universitas updated successfully.');

        return redirect(route('universitas.index'));
    }

    /**
     * Remove the specified Universitas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $universitas = $this->universitasRepository->findWithoutFail($id);

        if (empty($universitas)) {
            Flash::error('Universitas not found');

            return redirect(route('universitas.index'));
        }

        $this->universitasRepository->delete($id);

        Flash::success('Universitas deleted successfully.');

        return redirect(route('universitas.index'));
    }
}
