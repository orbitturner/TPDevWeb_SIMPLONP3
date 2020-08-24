<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgenciesFormRequest;
use App\Models\Agency;
use Exception;

class AgenciesController extends Controller
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
     * Display a listing of the agencies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $agencies = Agency::paginate(25);

        return view('agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new agency.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('agencies.create');
    }

    /**
     * Store a new agency in the storage.
     *
     * @param App\Http\Requests\AgenciesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(AgenciesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Agency::create($data);

            return redirect()->route('agencies.agency.index')
                ->with('success_message', 'Agency was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified agency.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $agency = Agency::findOrFail($id);

        return view('agencies.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified agency.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $agency = Agency::findOrFail($id);
        

        return view('agencies.edit', compact('agency'));
    }

    /**
     * Update the specified agency in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\AgenciesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, AgenciesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $agency = Agency::findOrFail($id);
            $agency->update($data);

            return redirect()->route('agencies.agency.index')
                ->with('success_message', 'Agency was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified agency from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $agency = Agency::findOrFail($id);
            $agency->delete();

            return redirect()->route('agencies.agency.index')
                ->with('success_message', 'Agency was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
