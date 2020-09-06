<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOpeningfeeAPIRequest;
use App\Http\Requests\API\UpdateOpeningfeeAPIRequest;
use App\Models\Openingfee;
use App\Repositories\OpeningfeeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OpeningfeeController
 * @package App\Http\Controllers\API
 */

class OpeningfeeAPIController extends AppBaseController
{
    /** @var  OpeningfeeRepository */
    private $openingfeeRepository;

    public function __construct(OpeningfeeRepository $openingfeeRepo)
    {
        $this->openingfeeRepository = $openingfeeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/openingfees",
     *      summary="Get a listing of the Openingfees.",
     *      tags={"Openingfee"},
     *      description="Get all Openingfees",
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
     *                  @SWG\Items(ref="#/definitions/Openingfee")
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
        $openingfees = $this->openingfeeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($openingfees->toArray(), 'Openingfees retrieved successfully');
    }

    /**
     * @param CreateOpeningfeeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/openingfees",
     *      summary="Store a newly created Openingfee in storage",
     *      tags={"Openingfee"},
     *      description="Store Openingfee",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Openingfee that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Openingfee")
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
     *                  ref="#/definitions/Openingfee"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateOpeningfeeAPIRequest $request)
    {
        $input = $request->all();

        $openingfee = $this->openingfeeRepository->create($input);

        return $this->sendResponse($openingfee->toArray(), 'Openingfee saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/openingfees/{id}",
     *      summary="Display the specified Openingfee",
     *      tags={"Openingfee"},
     *      description="Get Openingfee",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Openingfee",
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
     *                  ref="#/definitions/Openingfee"
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
        /** @var Openingfee $openingfee */
        $openingfee = $this->openingfeeRepository->find($id);

        if (empty($openingfee)) {
            return $this->sendError('Openingfee not found');
        }

        return $this->sendResponse($openingfee->toArray(), 'Openingfee retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateOpeningfeeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/openingfees/{id}",
     *      summary="Update the specified Openingfee in storage",
     *      tags={"Openingfee"},
     *      description="Update Openingfee",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Openingfee",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Openingfee that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Openingfee")
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
     *                  ref="#/definitions/Openingfee"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateOpeningfeeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Openingfee $openingfee */
        $openingfee = $this->openingfeeRepository->find($id);

        if (empty($openingfee)) {
            return $this->sendError('Openingfee not found');
        }

        $openingfee = $this->openingfeeRepository->update($input, $id);

        return $this->sendResponse($openingfee->toArray(), 'Openingfee updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/openingfees/{id}",
     *      summary="Remove the specified Openingfee from storage",
     *      tags={"Openingfee"},
     *      description="Delete Openingfee",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Openingfee",
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
        /** @var Openingfee $openingfee */
        $openingfee = $this->openingfeeRepository->find($id);

        if (empty($openingfee)) {
            return $this->sendError('Openingfee not found');
        }

        $openingfee->delete();

        return $this->sendSuccess('Openingfee deleted successfully');
    }
}
