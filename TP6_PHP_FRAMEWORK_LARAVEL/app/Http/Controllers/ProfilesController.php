<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilesFormRequest;
use App\Models\Profile;
use Exception;

class ProfilesController extends Controller
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
     * Display a listing of the profiles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $profiles = Profile::paginate(25);

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new profile.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('profiles.create');
    }

    /**
     * Store a new profile in the storage.
     *
     * @param App\Http\Requests\ProfilesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProfilesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Profile::create($data);

            return redirect()->route('profiles.profile.index')
                ->with('success_message', 'Profile was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified profile.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);

        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        

        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified profile in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\ProfilesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProfilesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $profile = Profile::findOrFail($id);
            $profile->update($data);

            return redirect()->route('profiles.profile.index')
                ->with('success_message', 'Profile was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified profile from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $profile = Profile::findOrFail($id);
            $profile->delete();

            return redirect()->route('profiles.profile.index')
                ->with('success_message', 'Profile was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
