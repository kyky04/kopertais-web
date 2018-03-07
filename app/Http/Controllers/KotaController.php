<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKotaRequest;
use App\Http\Requests\UpdateKotaRequest;
use App\Repositories\KotaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KotaController extends AppBaseController
{
    /** @var  KotaRepository */
    private $kotaRepository;

    public function __construct(KotaRepository $kotaRepo)
    {
        $this->kotaRepository = $kotaRepo;
    }

    /**
     * Display a listing of the Kota.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kotaRepository->pushCriteria(new RequestCriteria($request));
        $kotas = $this->kotaRepository->all();

        return view('kotas.index')
            ->with('kotas', $kotas);
    }

    /**
     * Show the form for creating a new Kota.
     *
     * @return Response
     */
    public function create()
    {
        return view('kotas.create');
    }

    /**
     * Store a newly created Kota in storage.
     *
     * @param CreateKotaRequest $request
     *
     * @return Response
     */
    public function store(CreateKotaRequest $request)
    {
        $input = $request->all();

        $kota = $this->kotaRepository->create($input);

        Flash::success('Kota saved successfully.');

        return redirect(route('kotas.index'));
    }

    /**
     * Display the specified Kota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kota = $this->kotaRepository->findWithoutFail($id);

        if (empty($kota)) {
            Flash::error('Kota not found');

            return redirect(route('kotas.index'));
        }

        return view('kotas.show')->with('kota', $kota);
    }

    /**
     * Show the form for editing the specified Kota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kota = $this->kotaRepository->findWithoutFail($id);

        if (empty($kota)) {
            Flash::error('Kota not found');

            return redirect(route('kotas.index'));
        }

        return view('kotas.edit')->with('kota', $kota);
    }

    /**
     * Update the specified Kota in storage.
     *
     * @param  int              $id
     * @param UpdateKotaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKotaRequest $request)
    {
        $kota = $this->kotaRepository->findWithoutFail($id);

        if (empty($kota)) {
            Flash::error('Kota not found');

            return redirect(route('kotas.index'));
        }

        $kota = $this->kotaRepository->update($request->all(), $id);

        Flash::success('Kota updated successfully.');

        return redirect(route('kotas.index'));
    }

    /**
     * Remove the specified Kota from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kota = $this->kotaRepository->findWithoutFail($id);

        if (empty($kota)) {
            Flash::error('Kota not found');

            return redirect(route('kotas.index'));
        }

        $this->kotaRepository->delete($id);

        Flash::success('Kota deleted successfully.');

        return redirect(route('kotas.index'));
    }
}
