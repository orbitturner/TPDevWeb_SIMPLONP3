<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompteepsxEtatsFormRequest;
use App\Models\CompteepsxEtat;
use App\Models\State;
use Exception;

class CompteepsxEtatsController extends Controller
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
     * Display a listing of the compteepsx etats.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $compteepsxEtats = CompteepsxEtat::with('state')->paginate(25);

        return view('compteepsx_etats.index', compact('compteepsxEtats'));
    }

    /**
     * Show the form for creating a new compteepsx etat.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $States = State::pluck('id','id')->all();
        
        return view('compteepsx_etats.create', compact('States'));
    }

    /**
     * Store a new compteepsx etat in the storage.
     *
     * @param App\Http\Requests\CompteepsxEtatsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CompteepsxEtatsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            CompteepsxEtat::create($data);

            return redirect()->route('compteepsx_etats.compteepsx_etat.index')
                ->with('success_message', 'Compteepsx Etat was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified compteepsx etat.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $compteepsxEtat = CompteepsxEtat::with('state')->findOrFail($id);

        return view('compteepsx_etats.show', compact('compteepsxEtat'));
    }

    /**
     * Show the form for editing the specified compteepsx etat.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $compteepsxEtat = CompteepsxEtat::findOrFail($id);
        $States = State::pluck('id','id')->all();

        return view('compteepsx_etats.edit', compact('compteepsxEtat','States'));
    }

    /**
     * Update the specified compteepsx etat in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\CompteepsxEtatsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CompteepsxEtatsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $compteepsxEtat = CompteepsxEtat::findOrFail($id);
            $compteepsxEtat->update($data);

            return redirect()->route('compteepsx_etats.compteepsx_etat.index')
                ->with('success_message', 'Compteepsx Etat was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified compteepsx etat from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $compteepsxEtat = CompteepsxEtat::findOrFail($id);
            $compteepsxEtat->delete();

            return redirect()->route('compteepsx_etats.compteepsx_etat.index')
                ->with('success_message', 'Compteepsx Etat was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
