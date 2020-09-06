<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpeningfeeRequest;
use App\Http\Requests\UpdateOpeningfeeRequest;
use App\Repositories\OpeningfeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OpeningfeeController extends AppBaseController
{
    /** @var  OpeningfeeRepository */
    private $openingfeeRepository;

    public function __construct(OpeningfeeRepository $openingfeeRepo)
    {
        $this->openingfeeRepository = $openingfeeRepo;
    }

    /**
     * Display a listing of the Openingfee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $openingfees = $this->openingfeeRepository->all();

        return view('openingfees.index')
            ->with('openingfees', $openingfees);
    }

    /**
     * Show the form for creating a new Openingfee.
     *
     * @return Response
     */
    public function create()
    {
        return view('openingfees.create');
    }

    /**
     * Store a newly created Openingfee in storage.
     *
     * @param CreateOpeningfeeRequest $request
     *
     * @return Response
     */
    public function store(CreateOpeningfeeRequest $request)
    {
        $input = $request->all();

        $openingfee = $this->openingfeeRepository->create($input);

        Flash::success('Openingfee saved successfully.');

        return redirect(route('openingfees.index'));
    }

    /**
     * Display the specified Openingfee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $openingfee = $this->openingfeeRepository->find($id);

        if (empty($openingfee)) {
            Flash::error('Openingfee not found');

            return redirect(route('openingfees.index'));
        }

        return view('openingfees.show')->with('openingfee', $openingfee);
    }

    /**
     * Show the form for editing the specified Openingfee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $openingfee = $this->openingfeeRepository->find($id);

        if (empty($openingfee)) {
            Flash::error('Openingfee not found');

            return redirect(route('openingfees.index'));
        }

        return view('openingfees.edit')->with('openingfee', $openingfee);
    }

    /**
     * Update the specified Openingfee in storage.
     *
     * @param int $id
     * @param UpdateOpeningfeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpeningfeeRequest $request)
    {
        $openingfee = $this->openingfeeRepository->find($id);

        if (empty($openingfee)) {
            Flash::error('Openingfee not found');

            return redirect(route('openingfees.index'));
        }

        $openingfee = $this->openingfeeRepository->update($request->all(), $id);

        Flash::success('Openingfee updated successfully.');

        return redirect(route('openingfees.index'));
    }

    /**
     * Remove the specified Openingfee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $openingfee = $this->openingfeeRepository->find($id);

        if (empty($openingfee)) {
            Flash::error('Openingfee not found');

            return redirect(route('openingfees.index'));
        }

        $this->openingfeeRepository->delete($id);

        Flash::success('Openingfee deleted successfully.');

        return redirect(route('openingfees.index'));
    }
}
