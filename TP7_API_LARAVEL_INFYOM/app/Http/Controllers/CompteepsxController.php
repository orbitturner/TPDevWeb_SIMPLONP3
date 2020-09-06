<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompteepsxRequest;
use App\Http\Requests\UpdateCompteepsxRequest;
use App\Repositories\CompteepsxRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CompteepsxController extends AppBaseController
{
    /** @var  CompteepsxRepository */
    private $compteepsxRepository;

    public function __construct(CompteepsxRepository $compteepsxRepo)
    {
        $this->compteepsxRepository = $compteepsxRepo;
    }

    /**
     * Display a listing of the Compteepsx.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $compteepsxes = $this->compteepsxRepository->all();

        return view('compteepsxes.index')
            ->with('compteepsxes', $compteepsxes);
    }

    /**
     * Show the form for creating a new Compteepsx.
     *
     * @return Response
     */
    public function create()
    {
        return view('compteepsxes.create');
    }

    /**
     * Store a newly created Compteepsx in storage.
     *
     * @param CreateCompteepsxRequest $request
     *
     * @return Response
     */
    public function store(CreateCompteepsxRequest $request)
    {
        $input = $request->all();

        $compteepsx = $this->compteepsxRepository->create($input);

        Flash::success('Compteepsx saved successfully.');

        return redirect(route('compteepsxes.index'));
    }

    /**
     * Display the specified Compteepsx.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compteepsx = $this->compteepsxRepository->find($id);

        if (empty($compteepsx)) {
            Flash::error('Compteepsx not found');

            return redirect(route('compteepsxes.index'));
        }

        return view('compteepsxes.show')->with('compteepsx', $compteepsx);
    }

    /**
     * Show the form for editing the specified Compteepsx.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compteepsx = $this->compteepsxRepository->find($id);

        if (empty($compteepsx)) {
            Flash::error('Compteepsx not found');

            return redirect(route('compteepsxes.index'));
        }

        return view('compteepsxes.edit')->with('compteepsx', $compteepsx);
    }

    /**
     * Update the specified Compteepsx in storage.
     *
     * @param int $id
     * @param UpdateCompteepsxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompteepsxRequest $request)
    {
        $compteepsx = $this->compteepsxRepository->find($id);

        if (empty($compteepsx)) {
            Flash::error('Compteepsx not found');

            return redirect(route('compteepsxes.index'));
        }

        $compteepsx = $this->compteepsxRepository->update($request->all(), $id);

        Flash::success('Compteepsx updated successfully.');

        return redirect(route('compteepsxes.index'));
    }

    /**
     * Remove the specified Compteepsx from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compteepsx = $this->compteepsxRepository->find($id);

        if (empty($compteepsx)) {
            Flash::error('Compteepsx not found');

            return redirect(route('compteepsxes.index'));
        }

        $this->compteepsxRepository->delete($id);

        Flash::success('Compteepsx deleted successfully.');

        return redirect(route('compteepsxes.index'));
    }
}
