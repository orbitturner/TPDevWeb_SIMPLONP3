<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeesFormRequest;
use App\Models\Agency;
use App\Models\Employee;
use App\Models\User;
use Exception;

class EmployeesController extends Controller
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
     * Display a listing of the employees.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::with('user','agency')->paginate(25);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('id','id')->all();
$Agencies = Agency::pluck('nom','id')->all();
        
        return view('employees.create', compact('Users','Agencies'));
    }

    /**
     * Store a new employee in the storage.
     *
     * @param App\Http\Requests\EmployeesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(EmployeesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Employee::create($data);

            return redirect()->route('employees.employee.index')
                ->with('success_message', 'Employee was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified employee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $employee = Employee::with('user','agency')->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $Users = User::pluck('id','id')->all();
$Agencies = Agency::pluck('nom','id')->all();

        return view('employees.edit', compact('employee','Users','Agencies'));
    }

    /**
     * Update the specified employee in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\EmployeesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, EmployeesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $employee = Employee::findOrFail($id);
            $employee->update($data);

            return redirect()->route('employees.employee.index')
                ->with('success_message', 'Employee was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified employee from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return redirect()->route('employees.employee.index')
                ->with('success_message', 'Employee was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
