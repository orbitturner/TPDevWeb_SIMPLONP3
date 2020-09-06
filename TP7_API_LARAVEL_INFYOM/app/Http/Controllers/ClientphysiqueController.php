<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientphysiqueRequest;
use App\Http\Requests\UpdateClientphysiqueRequest;
use App\Repositories\ClientphysiqueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ClientphysiqueController extends AppBaseController
{
    /** @var  ClientphysiqueRepository */
    private $clientphysiqueRepository;

    public function __construct(ClientphysiqueRepository $clientphysiqueRepo)
    {
        $this->clientphysiqueRepository = $clientphysiqueRepo;
    }

    /**
     * Display a listing of the Clientphysique.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientphysiques = $this->clientphysiqueRepository->all();

        return view('clientphysiques.index')
            ->with('clientphysiques', $clientphysiques);
    }

    /**
     * Show the form for creating a new Clientphysique.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientphysiques.create');
    }

    /**
     * Store a newly created Clientphysique in storage.
     *
     * @param CreateClientphysiqueRequest $request
     *
     * @return Response
     */
    public function store(CreateClientphysiqueRequest $request)
    {
        $input = $request->all();

        $clientphysique = $this->clientphysiqueRepository->create($input);

        Flash::success('Clientphysique saved successfully.');

        return redirect(route('clientphysiques.index'));
    }

    /**
     * Display the specified Clientphysique.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            Flash::error('Clientphysique not found');

            return redirect(route('clientphysiques.index'));
        }

        return view('clientphysiques.show')->with('clientphysique', $clientphysique);
    }

    /**
     * Show the form for editing the specified Clientphysique.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            Flash::error('Clientphysique not found');

            return redirect(route('clientphysiques.index'));
        }

        return view('clientphysiques.edit')->with('clientphysique', $clientphysique);
    }

    /**
     * Update the specified Clientphysique in storage.
     *
     * @param int $id
     * @param UpdateClientphysiqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientphysiqueRequest $request)
    {
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            Flash::error('Clientphysique not found');

            return redirect(route('clientphysiques.index'));
        }

        $clientphysique = $this->clientphysiqueRepository->update($request->all(), $id);

        Flash::success('Clientphysique updated successfully.');

        return redirect(route('clientphysiques.index'));
    }

    /**
     * Remove the specified Clientphysique from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            Flash::error('Clientphysique not found');

            return redirect(route('clientphysiques.index'));
        }

        $this->clientphysiqueRepository->delete($id);

        Flash::success('Clientphysique deleted successfully.');

        return redirect(route('clientphysiques.index'));
    }
}
