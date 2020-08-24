<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatesFormRequest;
use App\Models\State;
use Exception;

class StatesController extends Controller
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
     * Display a listing of the states.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $states = State::paginate(25);

        return view('states.index', compact('states'));
    }

    /**
     * Show the form for creating a new state.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('states.create');
    }

    /**
     * Store a new state in the storage.
     *
     * @param App\Http\Requests\StatesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(StatesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            State::create($data);

            return redirect()->route('states.state.index')
                ->with('success_message', 'State was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified state.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $state = State::findOrFail($id);

        return view('states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified state.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $state = State::findOrFail($id);
        

        return view('states.edit', compact('state'));
    }

    /**
     * Update the specified state in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\StatesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, StatesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $state = State::findOrFail($id);
            $state->update($data);

            return redirect()->route('states.state.index')
                ->with('success_message', 'State was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified state from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $state = State::findOrFail($id);
            $state->delete();

            return redirect()->route('states.state.index')
                ->with('success_message', 'State was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
