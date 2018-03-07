<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePerjalananRequest;
use App\Http\Requests\UpdatePerjalananRequest;
use App\Repositories\PerjalananRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PerjalananController extends AppBaseController
{
    /** @var  PerjalananRepository */
    private $perjalananRepository;

    public function __construct(PerjalananRepository $perjalananRepo)
    {
        $this->perjalananRepository = $perjalananRepo;
    }

    /**
     * Display a listing of the Perjalanan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->perjalananRepository->pushCriteria(new RequestCriteria($request));
        $perjalanans = $this->perjalananRepository->all();

        return view('perjalanans.index')
            ->with('perjalanans', $perjalanans);
    }

    /**
     * Show the form for creating a new Perjalanan.
     *
     * @return Response
     */
    public function create()
    {
        return view('perjalanans.create');
    }

    /**
     * Store a newly created Perjalanan in storage.
     *
     * @param CreatePerjalananRequest $request
     *
     * @return Response
     */
    public function store(CreatePerjalananRequest $request)
    {
        $input = $request->all();

        $perjalanan = $this->perjalananRepository->create($input);

        Flash::success('Perjalanan saved successfully.');

        return redirect(route('perjalanans.index'));
    }

    /**
     * Display the specified Perjalanan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perjalanan = $this->perjalananRepository->findWithoutFail($id);

        if (empty($perjalanan)) {
            Flash::error('Perjalanan not found');

            return redirect(route('perjalanans.index'));
        }

        return view('perjalanans.show')->with('perjalanan', $perjalanan);
    }

    /**
     * Show the form for editing the specified Perjalanan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perjalanan = $this->perjalananRepository->findWithoutFail($id);

        if (empty($perjalanan)) {
            Flash::error('Perjalanan not found');

            return redirect(route('perjalanans.index'));
        }

        return view('perjalanans.edit')->with('perjalanan', $perjalanan);
    }

    /**
     * Update the specified Perjalanan in storage.
     *
     * @param  int              $id
     * @param UpdatePerjalananRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerjalananRequest $request)
    {
        $perjalanan = $this->perjalananRepository->findWithoutFail($id);

        if (empty($perjalanan)) {
            Flash::error('Perjalanan not found');

            return redirect(route('perjalanans.index'));
        }

        $perjalanan = $this->perjalananRepository->update($request->all(), $id);

        Flash::success('Perjalanan updated successfully.');

        return redirect(route('perjalanans.index'));
    }

    /**
     * Remove the specified Perjalanan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perjalanan = $this->perjalananRepository->findWithoutFail($id);

        if (empty($perjalanan)) {
            Flash::error('Perjalanan not found');

            return redirect(route('perjalanans.index'));
        }

        $this->perjalananRepository->delete($id);

        Flash::success('Perjalanan deleted successfully.');

        return redirect(route('perjalanans.index'));
    }
}
