<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStateAPIRequest;
use App\Http\Requests\API\UpdateStateAPIRequest;
use App\Models\State;
use App\Repositories\StateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StateController
 * @package App\Http\Controllers\API
 */

class StateAPIController extends AppBaseController
{
    /** @var  StateRepository */
    private $stateRepository;

    public function __construct(StateRepository $stateRepo)
    {
        $this->stateRepository = $stateRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/states",
     *      summary="Get a listing of the States.",
     *      tags={"State"},
     *      description="Get all States",
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
     *                  @SWG\Items(ref="#/definitions/State")
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
        $states = $this->stateRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($states->toArray(), 'States retrieved successfully');
    }

    /**
     * @param CreateStateAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/states",
     *      summary="Store a newly created State in storage",
     *      tags={"State"},
     *      description="Store State",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="State that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/State")
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
     *                  ref="#/definitions/State"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStateAPIRequest $request)
    {
        $input = $request->all();

        $state = $this->stateRepository->create($input);

        return $this->sendResponse($state->toArray(), 'State saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/states/{id}",
     *      summary="Display the specified State",
     *      tags={"State"},
     *      description="Get State",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of State",
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
     *                  ref="#/definitions/State"
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
        /** @var State $state */
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            return $this->sendError('State not found');
        }

        return $this->sendResponse($state->toArray(), 'State retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStateAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/states/{id}",
     *      summary="Update the specified State in storage",
     *      tags={"State"},
     *      description="Update State",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of State",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="State that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/State")
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
     *                  ref="#/definitions/State"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStateAPIRequest $request)
    {
        $input = $request->all();

        /** @var State $state */
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            return $this->sendError('State not found');
        }

        $state = $this->stateRepository->update($input, $id);

        return $this->sendResponse($state->toArray(), 'State updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/states/{id}",
     *      summary="Remove the specified State from storage",
     *      tags={"State"},
     *      description="Delete State",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of State",
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
        /** @var State $state */
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            return $this->sendError('State not found');
        }

        $state->delete();

        return $this->sendSuccess('State deleted successfully');
    }
}
