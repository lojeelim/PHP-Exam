<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array (
           'employee' => Employee::orderBy('firstname')->paginate(10)
        );

        return view('employee.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'company' => Company::all()
        );
        // dd($data);
        return view('employee.add_employee')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'company' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required',

       ]);

        $employee  = new Employee;
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->company_id = $request->input('company');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();

        $data = array (
            'employee' => Employee::orderBy('firstname')->paginate(10),
            'message' => 'New Employee Added Successfully!'
         );

         return redirect('employee')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'employee' => Employee::find($id),
            'company' => Employee::find($id)->company
        );
        // dd($data);
        return view('employee.view_employee')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = array(
            'employee' => Employee::find($id),
            'company' => Employee::first()->company::all()
        );
        // dd($data);
        return view('employee.edit_employee')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request ,[
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required',

       ]);

        $employee  = Employee::find($id);
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->company_id = $request->input('company');
        $employee->email = $employee->email !== $request->input('email')? $request->input('email'): $employee->email;
        $employee->phone = $request->input('phone');
        $employee->save();

        $data = array (
            'employee' => Employee::orderBy('firstname')->paginate(10),
            'message' => 'Employee Updated Successfully!'
         );

         return redirect('employee')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        $data = array(
            'employee' => Employee::orderBy('firstname')->paginate(10),
             'message' => 'Employee Deleted Successfully!'
        );

        return redirect('employee')->with($data);
    }
    public function search(Request $request)
    {

        $search = $request->input('search');
        $employee = Employee::orderBy('firstname')
        ->where('firstname', 'like' , "%$search%")
        ->orWhere('lastname' , 'like' , "%$search%")
        ->orWhere('email' , 'like' , "%$search%")->paginate(8);
        // dd($company);
        return view('employee.search_employee')->with('employee', $employee);
    }
}
