<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientphysiqueAPIRequest;
use App\Http\Requests\API\UpdateClientphysiqueAPIRequest;
use App\Models\Clientphysique;
use App\Repositories\ClientphysiqueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClientphysiqueController
 * @package App\Http\Controllers\API
 */

class ClientphysiqueAPIController extends AppBaseController
{
    /** @var  ClientphysiqueRepository */
    private $clientphysiqueRepository;

    public function __construct(ClientphysiqueRepository $clientphysiqueRepo)
    {
        $this->clientphysiqueRepository = $clientphysiqueRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/clientphysiques",
     *      summary="Get a listing of the Clientphysiques.",
     *      tags={"Clientphysique"},
     *      description="Get all Clientphysiques",
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
     *                  @SWG\Items(ref="#/definitions/Clientphysique")
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
        $clientphysiques = $this->clientphysiqueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientphysiques->toArray(), 'Clientphysiques retrieved successfully');
    }

    /**
     * @param CreateClientphysiqueAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/clientphysiques",
     *      summary="Store a newly created Clientphysique in storage",
     *      tags={"Clientphysique"},
     *      description="Store Clientphysique",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Clientphysique that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Clientphysique")
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
     *                  ref="#/definitions/Clientphysique"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateClientphysiqueAPIRequest $request)
    {
        $input = $request->all();

        $clientphysique = $this->clientphysiqueRepository->create($input);

        return $this->sendResponse($clientphysique->toArray(), 'Clientphysique saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/clientphysiques/{id}",
     *      summary="Display the specified Clientphysique",
     *      tags={"Clientphysique"},
     *      description="Get Clientphysique",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Clientphysique",
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
     *                  ref="#/definitions/Clientphysique"
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
        /** @var Clientphysique $clientphysique */
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            return $this->sendError('Clientphysique not found');
        }

        return $this->sendResponse($clientphysique->toArray(), 'Clientphysique retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateClientphysiqueAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/clientphysiques/{id}",
     *      summary="Update the specified Clientphysique in storage",
     *      tags={"Clientphysique"},
     *      description="Update Clientphysique",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Clientphysique",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Clientphysique that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Clientphysique")
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
     *                  ref="#/definitions/Clientphysique"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateClientphysiqueAPIRequest $request)
    {
        $input = $request->all();

        /** @var Clientphysique $clientphysique */
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            return $this->sendError('Clientphysique not found');
        }

        $clientphysique = $this->clientphysiqueRepository->update($input, $id);

        return $this->sendResponse($clientphysique->toArray(), 'Clientphysique updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/clientphysiques/{id}",
     *      summary="Remove the specified Clientphysique from storage",
     *      tags={"Clientphysique"},
     *      description="Delete Clientphysique",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Clientphysique",
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
        /** @var Clientphysique $clientphysique */
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            return $this->sendError('Clientphysique not found');
        }

        $clientphysique->delete();

        return $this->sendSuccess('Clientphysique deleted successfully');
    }
}
