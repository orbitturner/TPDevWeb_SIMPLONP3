<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateagencyAPIRequest;
use App\Http\Requests\API\UpdateagencyAPIRequest;
use App\Models\agency;
use App\Repositories\agencyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class agencyController
 * @package App\Http\Controllers\API
 */

class agencyAPIController extends AppBaseController
{
    /** @var  agencyRepository */
    private $agencyRepository;

    public function __construct(agencyRepository $agencyRepo)
    {
        $this->agencyRepository = $agencyRepo;
    }

    /**
     * Display a listing of the agency.
     * GET|HEAD /agencies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $agencies = $this->agencyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($agencies->toArray(), 'Agencies retrieved successfully');
    }

    /**
     * Store a newly created agency in storage.
     * POST /agencies
     *
     * @param CreateagencyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateagencyAPIRequest $request)
    {
        $input = $request->all();

        $agency = $this->agencyRepository->create($input);

        return $this->sendResponse($agency->toArray(), 'Agency saved successfully');
    }

    /**
     * Display the specified agency.
     * GET|HEAD /agencies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var agency $agency */
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            return $this->sendError('Agency not found');
        }

        return $this->sendResponse($agency->toArray(), 'Agency retrieved successfully');
    }

    /**
     * Update the specified agency in storage.
     * PUT/PATCH /agencies/{id}
     *
     * @param int $id
     * @param UpdateagencyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateagencyAPIRequest $request)
    {
        $input = $request->all();

        /** @var agency $agency */
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            return $this->sendError('Agency not found');
        }

        $agency = $this->agencyRepository->update($input, $id);

        return $this->sendResponse($agency->toArray(), 'agency updated successfully');
    }

    /**
     * Remove the specified agency from storage.
     * DELETE /agencies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var agency $agency */
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            return $this->sendError('Agency not found');
        }

        $agency->delete();

        return $this->sendSuccess('Agency deleted successfully');
    }
}
