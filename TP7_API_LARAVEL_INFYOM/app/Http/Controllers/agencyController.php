<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateagencyRequest;
use App\Http\Requests\UpdateagencyRequest;
use App\Repositories\agencyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class agencyController extends AppBaseController
{
    /** @var  agencyRepository */
    private $agencyRepository;

    public function __construct(agencyRepository $agencyRepo)
    {
        $this->agencyRepository = $agencyRepo;
    }

    /**
     * Display a listing of the agency.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $agencies = $this->agencyRepository->all();

        return view('agencies.index')
            ->with('agencies', $agencies);
    }

    /**
     * Show the form for creating a new agency.
     *
     * @return Response
     */
    public function create()
    {
        return view('agencies.create');
    }

    /**
     * Store a newly created agency in storage.
     *
     * @param CreateagencyRequest $request
     *
     * @return Response
     */
    public function store(CreateagencyRequest $request)
    {
        $input = $request->all();

        $agency = $this->agencyRepository->create($input);

        Flash::success('Agency saved successfully.');

        return redirect(route('agencies.index'));
    }

    /**
     * Display the specified agency.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        return view('agencies.show')->with('agency', $agency);
    }

    /**
     * Show the form for editing the specified agency.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        return view('agencies.edit')->with('agency', $agency);
    }

    /**
     * Update the specified agency in storage.
     *
     * @param int $id
     * @param UpdateagencyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateagencyRequest $request)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        $agency = $this->agencyRepository->update($request->all(), $id);

        Flash::success('Agency updated successfully.');

        return redirect(route('agencies.index'));
    }

    /**
     * Remove the specified agency from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        $this->agencyRepository->delete($id);

        Flash::success('Agency deleted successfully.');

        return redirect(route('agencies.index'));
    }
}
