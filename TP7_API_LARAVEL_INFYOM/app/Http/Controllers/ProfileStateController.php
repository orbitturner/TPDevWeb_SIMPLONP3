<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileStateRequest;
use App\Http\Requests\UpdateProfileStateRequest;
use App\Repositories\ProfileStateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProfileStateController extends AppBaseController
{
    /** @var  ProfileStateRepository */
    private $profileStateRepository;

    public function __construct(ProfileStateRepository $profileStateRepo)
    {
        $this->profileStateRepository = $profileStateRepo;
    }

    /**
     * Display a listing of the ProfileState.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $profileStates = $this->profileStateRepository->all();

        return view('profile_states.index')
            ->with('profileStates', $profileStates);
    }

    /**
     * Show the form for creating a new ProfileState.
     *
     * @return Response
     */
    public function create()
    {
        return view('profile_states.create');
    }

    /**
     * Store a newly created ProfileState in storage.
     *
     * @param CreateProfileStateRequest $request
     *
     * @return Response
     */
    public function store(CreateProfileStateRequest $request)
    {
        $input = $request->all();

        $profileState = $this->profileStateRepository->create($input);

        Flash::success('Profile State saved successfully.');

        return redirect(route('profileStates.index'));
    }

    /**
     * Display the specified ProfileState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profileState = $this->profileStateRepository->find($id);

        if (empty($profileState)) {
            Flash::error('Profile State not found');

            return redirect(route('profileStates.index'));
        }

        return view('profile_states.show')->with('profileState', $profileState);
    }

    /**
     * Show the form for editing the specified ProfileState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profileState = $this->profileStateRepository->find($id);

        if (empty($profileState)) {
            Flash::error('Profile State not found');

            return redirect(route('profileStates.index'));
        }

        return view('profile_states.edit')->with('profileState', $profileState);
    }

    /**
     * Update the specified ProfileState in storage.
     *
     * @param int $id
     * @param UpdateProfileStateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfileStateRequest $request)
    {
        $profileState = $this->profileStateRepository->find($id);

        if (empty($profileState)) {
            Flash::error('Profile State not found');

            return redirect(route('profileStates.index'));
        }

        $profileState = $this->profileStateRepository->update($request->all(), $id);

        Flash::success('Profile State updated successfully.');

        return redirect(route('profileStates.index'));
    }

    /**
     * Remove the specified ProfileState from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profileState = $this->profileStateRepository->find($id);

        if (empty($profileState)) {
            Flash::error('Profile State not found');

            return redirect(route('profileStates.index'));
        }

        $this->profileStateRepository->delete($id);

        Flash::success('Profile State deleted successfully.');

        return redirect(route('profileStates.index'));
    }
}
