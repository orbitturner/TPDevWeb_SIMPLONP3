<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgencyStateRequest;
use App\Http\Requests\UpdateAgencyStateRequest;
use App\Repositories\AgencyStateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AgencyStateController extends AppBaseController
{
    /** @var  AgencyStateRepository */
    private $agencyStateRepository;

    public function __construct(AgencyStateRepository $agencyStateRepo)
    {
        $this->agencyStateRepository = $agencyStateRepo;
    }

    /**
     * Display a listing of the AgencyState.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $agencyStates = $this->agencyStateRepository->all();

        return view('agency_states.index')
            ->with('agencyStates', $agencyStates);
    }

    /**
     * Show the form for creating a new AgencyState.
     *
     * @return Response
     */
    public function create()
    {
        return view('agency_states.create');
    }

    /**
     * Store a newly created AgencyState in storage.
     *
     * @param CreateAgencyStateRequest $request
     *
     * @return Response
     */
    public function store(CreateAgencyStateRequest $request)
    {
        $input = $request->all();

        $agencyState = $this->agencyStateRepository->create($input);

        Flash::success('Agency State saved successfully.');

        return redirect(route('agencyStates.index'));
    }

    /**
     * Display the specified AgencyState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agencyState = $this->agencyStateRepository->find($id);

        if (empty($agencyState)) {
            Flash::error('Agency State not found');

            return redirect(route('agencyStates.index'));
        }

        return view('agency_states.show')->with('agencyState', $agencyState);
    }

    /**
     * Show the form for editing the specified AgencyState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agencyState = $this->agencyStateRepository->find($id);

        if (empty($agencyState)) {
            Flash::error('Agency State not found');

            return redirect(route('agencyStates.index'));
        }

        return view('agency_states.edit')->with('agencyState', $agencyState);
    }

    /**
     * Update the specified AgencyState in storage.
     *
     * @param int $id
     * @param UpdateAgencyStateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgencyStateRequest $request)
    {
        $agencyState = $this->agencyStateRepository->find($id);

        if (empty($agencyState)) {
            Flash::error('Agency State not found');

            return redirect(route('agencyStates.index'));
        }

        $agencyState = $this->agencyStateRepository->update($request->all(), $id);

        Flash::success('Agency State updated successfully.');

        return redirect(route('agencyStates.index'));
    }

    /**
     * Remove the specified AgencyState from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agencyState = $this->agencyStateRepository->find($id);

        if (empty($agencyState)) {
            Flash::error('Agency State not found');

            return redirect(route('agencyStates.index'));
        }

        $this->agencyStateRepository->delete($id);

        Flash::success('Agency State deleted successfully.');

        return redirect(route('agencyStates.index'));
    }
}
