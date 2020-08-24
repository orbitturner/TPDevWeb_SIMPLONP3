<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgencyStatesFormRequest;
use App\Models\AgencyState;
use App\Models\State;
use Exception;

class AgencyStatesController extends Controller
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
     * Display a listing of the agency states.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $agencyStates = AgencyState::with('state')->paginate(25);

        return view('agency_states.index', compact('agencyStates'));
    }

    /**
     * Show the form for creating a new agency state.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $States = State::pluck('id','id')->all();
        
        return view('agency_states.create', compact('States'));
    }

    /**
     * Store a new agency state in the storage.
     *
     * @param App\Http\Requests\AgencyStatesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(AgencyStatesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            AgencyState::create($data);

            return redirect()->route('agency_states.agency_state.index')
                ->with('success_message', 'Agency State was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified agency state.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $agencyState = AgencyState::with('state')->findOrFail($id);

        return view('agency_states.show', compact('agencyState'));
    }

    /**
     * Show the form for editing the specified agency state.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $agencyState = AgencyState::findOrFail($id);
        $States = State::pluck('id','id')->all();

        return view('agency_states.edit', compact('agencyState','States'));
    }

    /**
     * Update the specified agency state in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\AgencyStatesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, AgencyStatesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $agencyState = AgencyState::findOrFail($id);
            $agencyState->update($data);

            return redirect()->route('agency_states.agency_state.index')
                ->with('success_message', 'Agency State was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified agency state from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $agencyState = AgencyState::findOrFail($id);
            $agencyState->delete();

            return redirect()->route('agency_states.agency_state.index')
                ->with('success_message', 'Agency State was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
