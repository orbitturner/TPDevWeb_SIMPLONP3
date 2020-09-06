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
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/agencies",
     *      summary="Get a listing of the agencies.",
     *      tags={"agency"},
     *      description="Get all agencies",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/agency")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
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
     * @param CreateagencyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/agencies",
     *      summary="Store a newly created agency in storage",
     *      tags={"agency"},
     *      description="Store agency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="agency that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/agency")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/agency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateagencyAPIRequest $request)
    {
        $input = $request->all();

        $agency = $this->agencyRepository->create($input);

        return $this->sendResponse($agency->toArray(), 'Agency saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/agencies/{id}",
     *      summary="Display the specified agency",
     *      tags={"agency"},
     *      description="Get agency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agency",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/agency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
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
     * @param int $id
     * @param UpdateagencyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/agencies/{id}",
     *      summary="Update the specified agency in storage",
     *      tags={"agency"},
     *      description="Update agency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agency",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="agency that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/agency")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/agency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
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
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/agencies/{id}",
     *      summary="Remove the specified agency from storage",
     *      tags={"agency"},
     *      description="Delete agency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agency",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
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
