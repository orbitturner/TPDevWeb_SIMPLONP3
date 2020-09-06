<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompteepsxAPIRequest;
use App\Http\Requests\API\UpdateCompteepsxAPIRequest;
use App\Models\Compteepsx;
use App\Repositories\CompteepsxRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CompteepsxController
 * @package App\Http\Controllers\API
 */

class CompteepsxAPIController extends AppBaseController
{
    /** @var  CompteepsxRepository */
    private $compteepsxRepository;

    public function __construct(CompteepsxRepository $compteepsxRepo)
    {
        $this->compteepsxRepository = $compteepsxRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/compteepsxes",
     *      summary="Get a listing of the Compteepsxes.",
     *      tags={"Compteepsx"},
     *      description="Get all Compteepsxes",
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
     *                  @SWG\Items(ref="#/definitions/Compteepsx")
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
        $compteepsxes = $this->compteepsxRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($compteepsxes->toArray(), 'Compteepsxes retrieved successfully');
    }

    /**
     * @param CreateCompteepsxAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/compteepsxes",
     *      summary="Store a newly created Compteepsx in storage",
     *      tags={"Compteepsx"},
     *      description="Store Compteepsx",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Compteepsx that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Compteepsx")
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
     *                  ref="#/definitions/Compteepsx"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCompteepsxAPIRequest $request)
    {
        $input = $request->all();

        $compteepsx = $this->compteepsxRepository->create($input);

        return $this->sendResponse($compteepsx->toArray(), 'Compteepsx saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/compteepsxes/{id}",
     *      summary="Display the specified Compteepsx",
     *      tags={"Compteepsx"},
     *      description="Get Compteepsx",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Compteepsx",
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
     *                  ref="#/definitions/Compteepsx"
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
        /** @var Compteepsx $compteepsx */
        $compteepsx = $this->compteepsxRepository->find($id);

        if (empty($compteepsx)) {
            return $this->sendError('Compteepsx not found');
        }

        return $this->sendResponse($compteepsx->toArray(), 'Compteepsx retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCompteepsxAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/compteepsxes/{id}",
     *      summary="Update the specified Compteepsx in storage",
     *      tags={"Compteepsx"},
     *      description="Update Compteepsx",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Compteepsx",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Compteepsx that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Compteepsx")
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
     *                  ref="#/definitions/Compteepsx"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCompteepsxAPIRequest $request)
    {
        $input = $request->all();

        /** @var Compteepsx $compteepsx */
        $compteepsx = $this->compteepsxRepository->find($id);

        if (empty($compteepsx)) {
            return $this->sendError('Compteepsx not found');
        }

        $compteepsx = $this->compteepsxRepository->update($input, $id);

        return $this->sendResponse($compteepsx->toArray(), 'Compteepsx updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/compteepsxes/{id}",
     *      summary="Remove the specified Compteepsx from storage",
     *      tags={"Compteepsx"},
     *      description="Delete Compteepsx",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Compteepsx",
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
        /** @var Compteepsx $compteepsx */
        $compteepsx = $this->compteepsxRepository->find($id);

        if (empty($compteepsx)) {
            return $this->sendError('Compteepsx not found');
        }

        $compteepsx->delete();

        return $this->sendSuccess('Compteepsx deleted successfully');
    }
}
