<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientphysiquesFormRequest;
use App\Models\Clientphysique;
use Exception;

class ClientphysiquesController extends Controller
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
     * Display a listing of the clientphysiques.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clientphysiques = Clientphysique::paginate(25);

        return view('clientphysiques.index', compact('clientphysiques'));
    }

    /**
     * Show the form for creating a new clientphysique.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('clientphysiques.create');
    }

    /**
     * Store a new clientphysique in the storage.
     *
     * @param App\Http\Requests\ClientphysiquesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ClientphysiquesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $row = Clientphysique::create($data);

            return redirect()->route('clientphysiques.clientphysique.index')
                ->with('success_message', 'Clientphysique was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.'.$exception]);
        }
    }

    /**
     * Display the specified clientphysique.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $clientphysique = Clientphysique::findOrFail($id);

        return view('clientphysiques.show', compact('clientphysique'));
    }

    /**
     * Show the form for editing the specified clientphysique.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $clientphysique = Clientphysique::findOrFail($id);
        

        return view('clientphysiques.edit', compact('clientphysique'));
    }

    /**
     * Update the specified clientphysique in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\ClientphysiquesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ClientphysiquesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $clientphysique = Clientphysique::findOrFail($id);
            $clientphysique->update($data);

            return redirect()->route('clientphysiques.clientphysique.index')
                ->with('success_message', 'Clientphysique was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified clientphysique from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $clientphysique = Clientphysique::findOrFail($id);
            $clientphysique->delete();

            return redirect()->route('clientphysiques.clientphysique.index')
                ->with('success_message', 'Clientphysique was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
