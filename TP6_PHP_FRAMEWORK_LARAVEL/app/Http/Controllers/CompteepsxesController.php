<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompteepsxesFormRequest;
use App\Models\Agency;
use App\Models\Clientphysique;
use App\Models\Compteepsx;
use App\Models\Openingfee;
use App\User;
use Exception;

class CompteepsxesController extends Controller
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
     * Display a listing of the compteepsxes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $compteepsxes = Compteepsx::with('clientphysique','user','agency','openingfee')->paginate(25);

        return view('compteepsxes.index', compact('compteepsxes'));
    }

    /**
     * Show the form for creating a new compteepsx.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Clientphysiques = Clientphysique::pluck('numId','id')->all();
$Users = User::pluck('id','id')->all();
$Agencies = Agency::pluck('id','id')->all();
$Openingfees = Openingfee::pluck('id','id')->all();
        
        return view('compteepsxes.create', compact('Clientphysiques','Users','Agencies','Openingfees'));
    }

    /**
     * Store a new compteepsx in the storage.
     *
     * @param App\Http\Requests\CompteepsxesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CompteepsxesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Compteepsx::create($data);

            return redirect()->route('compteepsxes.compteepsx.index')
                ->with('success_message', 'Compteepsx was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified compteepsx.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $compteepsx = Compteepsx::with('clientphysique','user','agency','openingfee')->findOrFail($id);

        return view('compteepsxes.show', compact('compteepsx'));
    }

    /**
     * Show the form for editing the specified compteepsx.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $compteepsx = Compteepsx::findOrFail($id);
        $Clientphysiques = Clientphysique::pluck('numId','id')->all();
$Users = User::pluck('id','id')->all();
$Agencies = Agency::pluck('id','id')->all();
$Openingfees = Openingfee::pluck('id','id')->all();

        return view('compteepsxes.edit', compact('compteepsx','Clientphysiques','Users','Agencies','Openingfees'));
    }

    /**
     * Update the specified compteepsx in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\CompteepsxesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CompteepsxesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $compteepsx = Compteepsx::findOrFail($id);
            $compteepsx->update($data);

            return redirect()->route('compteepsxes.compteepsx.index')
                ->with('success_message', 'Compteepsx was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified compteepsx from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $compteepsx = Compteepsx::findOrFail($id);
            $compteepsx->delete();

            return redirect()->route('compteepsxes.compteepsx.index')
                ->with('success_message', 'Compteepsx was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
