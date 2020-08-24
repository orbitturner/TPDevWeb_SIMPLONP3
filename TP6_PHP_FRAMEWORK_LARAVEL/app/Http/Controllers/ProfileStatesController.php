<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileStatesFormRequest;
use App\Models\ProfileState;
use App\Models\State;
use Exception;

class ProfileStatesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
    /**
     * Display a listing of the profile states.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $profileStates = ProfileState::with('state')->paginate(25);

        return view('profile_states.index', compact('profileStates'));
    }

    /**
     * Show the form for creating a new profile state.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $States = State::pluck('id','id')->all();
        
        return view('profile_states.create', compact('States'));
    }

    /**
     * Store a new profile state in the storage.
     *
     * @param App\Http\Requests\ProfileStatesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProfileStatesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ProfileState::create($data);

            return redirect()->route('profile_states.profile_state.index')
                ->with('success_message', 'Profile State was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified profile state.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $profileState = ProfileState::with('state')->findOrFail($id);

        return view('profile_states.show', compact('profileState'));
    }

    /**
     * Show the form for editing the specified profile state.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $profileState = ProfileState::findOrFail($id);
        $States = State::pluck('id','id')->all();

        return view('profile_states.edit', compact('profileState','States'));
    }

    /**
     * Update the specified profile state in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\ProfileStatesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProfileStatesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $profileState = ProfileState::findOrFail($id);
            $profileState->update($data);

            return redirect()->route('profile_states.profile_state.index')
                ->with('success_message', 'Profile State was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified profile state from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $profileState = ProfileState::findOrFail($id);
            $profileState->delete();

            return redirect()->route('profile_states.profile_state.index')
                ->with('success_message', 'Profile State was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
