<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'company' => Company::orderBy('name')->paginate(10)
        );
        // dd($data);
        return view('company.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.add_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request
       $this->validate($request ,[
            'company_name' => 'required|max:30',
            'company_website' => 'required',
            'email' => 'required|unique:companies',
            'logo' => 'image|nullable|max:1999',
       ]);

        //  ramdomize filename using PHP or validate image file
        if($request->hasFile('company_logo')){
            $file_with_ext = $request->company_logo->getClientOriginalName();
            $filename = pathinfo($file_with_ext, PATHINFO_FILENAME);
            $ext = $request->file('company_logo')->getClientOriginalExtension();
            $file = $filename.'_'.time().'.'.$ext;
            $request->company_logo->storeAs('public/company_logos/',$file);
        }else{$file = "noimage.jpeg";}

        $company = new Company;
        $company->name = $request->input('company_name');
        $company->email = $request->input('email');
        $company->website = $request->input('company_website');
        $company->logo =  $file;
        $company->save();

        $data = array(
            'company' => Company::orderBy('name')->paginate(10),
            'message' => 'New Company Added Successfully!'
        );

        return redirect('company')->with($data);
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
            'company' => Company::find($id),
            'employees' => Company::find($id)->employees
        );
        // dd($data);
        return view('company.view_company')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'company' => Company::find($id)
        );
        // dd($data);
        return view('company.edit_company')->with($data);
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
        $company = Company::find($id);

        $this->validate($request ,[
            'company_name' => 'required|max:30',
            'company_website' => 'required',
            'email' => 'required',
            'logo' => 'image|nullable|max:1999',
       ]);
        // remove the old file in public replace new upload file
        if($request->hasFile('company_logo') && $company->logo!== 'noimage.jpeg'){
            Storage::delete('public/company_logos/'.$company->logo);
        }
        // validate image file
        if($request->hasFile('company_logo')){
            $file_with_ext = $request->company_logo->getClientOriginalName();
            $filename = pathinfo($file_with_ext, PATHINFO_FILENAME);
            $ext = $request->file('company_logo')->getClientOriginalExtension();
            $file = $filename.'_'.time().'.'.$ext;
            $request->company_logo->storeAs('public/company_logos/',$file);
            $company->logo = $file;
        }

        $company->name = $request->input('company_name');
        $company->email = $request->input('email');
        $company->website = $request->input('company_website');
        $company->save();

        $data = array(
            'company' => Company::orderBy('name')->paginate(10),
            'message' => 'Company Updated Successfully!'
        );
        return redirect('company')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if($company->logo !== 'noimage.jpeg'){
            Storage::delete('public/company_logos/'.$company->logo);
        }

        $company->delete();
        $data = array(
            'company' => Company::orderBy('name')->paginate(10),
            'message' => 'Company Deleted Successfully!'
        );

        // return view('company.index')->with($data);

        return redirect('company')->with($data);
    }

    public function search(Request $request)
    {

        $search = $request->input('search');
        $company = Company::orderBy('name')->where('name', 'like' , "%$search%")->paginate(8);
        // dd($company);
        return view('company.search_company')->with('company', $company);
    }
}
