<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OpeningfeesFormRequest;
use App\Models\Openingfee;
use Exception;

class OpeningfeesController extends Controller
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
     * Display a listing of the openingfees.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $openingfees = Openingfee::paginate(25);

        return view('openingfees.index', compact('openingfees'));
    }

    /**
     * Show the form for creating a new openingfee.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('openingfees.create');
    }

    /**
     * Store a new openingfee in the storage.
     *
     * @param App\Http\Requests\OpeningfeesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(OpeningfeesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Openingfee::create($data);

            return redirect()->route('openingfees.openingfee.index')
                ->with('success_message', 'Openingfee was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified openingfee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $openingfee = Openingfee::findOrFail($id);

        return view('openingfees.show', compact('openingfee'));
    }

    /**
     * Show the form for editing the specified openingfee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $openingfee = Openingfee::findOrFail($id);
        

        return view('openingfees.edit', compact('openingfee'));
    }

    /**
     * Update the specified openingfee in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\OpeningfeesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, OpeningfeesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $openingfee = Openingfee::findOrFail($id);
            $openingfee->update($data);

            return redirect()->route('openingfees.openingfee.index')
                ->with('success_message', 'Openingfee was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified openingfee from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $openingfee = Openingfee::findOrFail($id);
            $openingfee->delete();

            return redirect()->route('openingfees.openingfee.index')
                ->with('success_message', 'Openingfee was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
