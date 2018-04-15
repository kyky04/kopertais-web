<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRekomendasiRequest;
use App\Http\Requests\UpdateRekomendasiRequest;
use App\Repositories\RekomendasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RekomendasiController extends AppBaseController
{
    /** @var  RekomendasiRepository */
    private $rekomendasiRepository;

    public function __construct(RekomendasiRepository $rekomendasiRepo)
    {
        $this->rekomendasiRepository = $rekomendasiRepo;
    }

    /**
     * Display a listing of the Rekomendasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rekomendasiRepository->pushCriteria(new RequestCriteria($request));
        $rekomendasis = $this->rekomendasiRepository->all();

        return view('rekomendasis.index')
            ->with('rekomendasis', $rekomendasis);
    }

    /**
     * Show the form for creating a new Rekomendasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('rekomendasis.create');
    }

    /**
     * Store a newly created Rekomendasi in storage.
     *
     * @param CreateRekomendasiRequest $request
     *
     * @return Response
     */
    public function store(CreateRekomendasiRequest $request)
    {
        $input = $request->all();

        $rekomendasi = $this->rekomendasiRepository->create($input);

        Flash::success('Rekomendasi saved successfully.');

        return redirect(route('rekomendasis.index'));
    }

    /**
     * Display the specified Rekomendasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rekomendasi = $this->rekomendasiRepository->findWithoutFail($id);

        if (empty($rekomendasi)) {
            Flash::error('Rekomendasi not found');

            return redirect(route('rekomendasis.index'));
        }

        return view('rekomendasis.show')->with('rekomendasi', $rekomendasi);
    }

    /**
     * Show the form for editing the specified Rekomendasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rekomendasi = $this->rekomendasiRepository->findWithoutFail($id);

        if (empty($rekomendasi)) {
            Flash::error('Rekomendasi not found');

            return redirect(route('rekomendasis.index'));
        }

        return view('rekomendasis.edit')->with('rekomendasi', $rekomendasi);
    }

    /**
     * Update the specified Rekomendasi in storage.
     *
     * @param  int              $id
     * @param UpdateRekomendasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRekomendasiRequest $request)
    {
        $rekomendasi = $this->rekomendasiRepository->findWithoutFail($id);

        if (empty($rekomendasi)) {
            Flash::error('Rekomendasi not found');

            return redirect(route('rekomendasis.index'));
        }

        $rekomendasi = $this->rekomendasiRepository->update($request->all(), $id);

        Flash::success('Rekomendasi updated successfully.');

        return redirect(route('rekomendasis.index'));
    }

    /**
     * Remove the specified Rekomendasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rekomendasi = $this->rekomendasiRepository->findWithoutFail($id);

        if (empty($rekomendasi)) {
            Flash::error('Rekomendasi not found');

            return redirect(route('rekomendasis.index'));
        }

        $this->rekomendasiRepository->delete($id);

        Flash::success('Rekomendasi deleted successfully.');

        return redirect(route('rekomendasis.index'));
    }
}
