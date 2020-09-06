<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompteepsxEtatRequest;
use App\Http\Requests\UpdateCompteepsxEtatRequest;
use App\Repositories\CompteepsxEtatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CompteepsxEtatController extends AppBaseController
{
    /** @var  CompteepsxEtatRepository */
    private $compteepsxEtatRepository;

    public function __construct(CompteepsxEtatRepository $compteepsxEtatRepo)
    {
        $this->compteepsxEtatRepository = $compteepsxEtatRepo;
    }

    /**
     * Display a listing of the CompteepsxEtat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $compteepsxEtats = $this->compteepsxEtatRepository->all();

        return view('compteepsx_etats.index')
            ->with('compteepsxEtats', $compteepsxEtats);
    }

    /**
     * Show the form for creating a new CompteepsxEtat.
     *
     * @return Response
     */
    public function create()
    {
        return view('compteepsx_etats.create');
    }

    /**
     * Store a newly created CompteepsxEtat in storage.
     *
     * @param CreateCompteepsxEtatRequest $request
     *
     * @return Response
     */
    public function store(CreateCompteepsxEtatRequest $request)
    {
        $input = $request->all();

        $compteepsxEtat = $this->compteepsxEtatRepository->create($input);

        Flash::success('Compteepsx Etat saved successfully.');

        return redirect(route('compteepsxEtats.index'));
    }

    /**
     * Display the specified CompteepsxEtat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compteepsxEtat = $this->compteepsxEtatRepository->find($id);

        if (empty($compteepsxEtat)) {
            Flash::error('Compteepsx Etat not found');

            return redirect(route('compteepsxEtats.index'));
        }

        return view('compteepsx_etats.show')->with('compteepsxEtat', $compteepsxEtat);
    }

    /**
     * Show the form for editing the specified CompteepsxEtat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compteepsxEtat = $this->compteepsxEtatRepository->find($id);

        if (empty($compteepsxEtat)) {
            Flash::error('Compteepsx Etat not found');

            return redirect(route('compteepsxEtats.index'));
        }

        return view('compteepsx_etats.edit')->with('compteepsxEtat', $compteepsxEtat);
    }

    /**
     * Update the specified CompteepsxEtat in storage.
     *
     * @param int $id
     * @param UpdateCompteepsxEtatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompteepsxEtatRequest $request)
    {
        $compteepsxEtat = $this->compteepsxEtatRepository->find($id);

        if (empty($compteepsxEtat)) {
            Flash::error('Compteepsx Etat not found');

            return redirect(route('compteepsxEtats.index'));
        }

        $compteepsxEtat = $this->compteepsxEtatRepository->update($request->all(), $id);

        Flash::success('Compteepsx Etat updated successfully.');

        return redirect(route('compteepsxEtats.index'));
    }

    /**
     * Remove the specified CompteepsxEtat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compteepsxEtat = $this->compteepsxEtatRepository->find($id);

        if (empty($compteepsxEtat)) {
            Flash::error('Compteepsx Etat not found');

            return redirect(route('compteepsxEtats.index'));
        }

        $this->compteepsxEtatRepository->delete($id);

        Flash::success('Compteepsx Etat deleted successfully.');

        return redirect(route('compteepsxEtats.index'));
    }
}
