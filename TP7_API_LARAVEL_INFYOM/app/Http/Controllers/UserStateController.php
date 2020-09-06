<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserStateRequest;
use App\Http\Requests\UpdateUserStateRequest;
use App\Repositories\UserStateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserStateController extends AppBaseController
{
    /** @var  UserStateRepository */
    private $userStateRepository;

    public function __construct(UserStateRepository $userStateRepo)
    {
        $this->userStateRepository = $userStateRepo;
    }

    /**
     * Display a listing of the UserState.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userStates = $this->userStateRepository->all();

        return view('user_states.index')
            ->with('userStates', $userStates);
    }

    /**
     * Show the form for creating a new UserState.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_states.create');
    }

    /**
     * Store a newly created UserState in storage.
     *
     * @param CreateUserStateRequest $request
     *
     * @return Response
     */
    public function store(CreateUserStateRequest $request)
    {
        $input = $request->all();

        $userState = $this->userStateRepository->create($input);

        Flash::success('User State saved successfully.');

        return redirect(route('userStates.index'));
    }

    /**
     * Display the specified UserState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userState = $this->userStateRepository->find($id);

        if (empty($userState)) {
            Flash::error('User State not found');

            return redirect(route('userStates.index'));
        }

        return view('user_states.show')->with('userState', $userState);
    }

    /**
     * Show the form for editing the specified UserState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userState = $this->userStateRepository->find($id);

        if (empty($userState)) {
            Flash::error('User State not found');

            return redirect(route('userStates.index'));
        }

        return view('user_states.edit')->with('userState', $userState);
    }

    /**
     * Update the specified UserState in storage.
     *
     * @param int $id
     * @param UpdateUserStateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserStateRequest $request)
    {
        $userState = $this->userStateRepository->find($id);

        if (empty($userState)) {
            Flash::error('User State not found');

            return redirect(route('userStates.index'));
        }

        $userState = $this->userStateRepository->update($request->all(), $id);

        Flash::success('User State updated successfully.');

        return redirect(route('userStates.index'));
    }

    /**
     * Remove the specified UserState from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userState = $this->userStateRepository->find($id);

        if (empty($userState)) {
            Flash::error('User State not found');

            return redirect(route('userStates.index'));
        }

        $this->userStateRepository->delete($id);

        Flash::success('User State deleted successfully.');

        return redirect(route('userStates.index'));
    }
}
