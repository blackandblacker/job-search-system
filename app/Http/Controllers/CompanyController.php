<?php

namespace App\Http\Controllers;

use DemeterChain\C;
use Illuminate\Http\Request;
use App\Company;
use App\Job;
use DB;
use Session;

class CompanyController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search3(Request $request)
    {

        $search = $request->get('search3');
        $companies = DB::table('companies')->where('name', 'like','%' .$search. '%')
            ->orwhere('city','like', '%' .$search. '%')
            ->paginate(5);
        return view ('companies.index',['companies' => $companies]);
    }

    public function index()
    {

        $companies = Company::orderBy('name','asc')->paginate(4);
        return view('companies.index',compact('companies','s'))->with('companies',$companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jobModel = new Job();
        $allJobs = $jobModel::all()->pluck('position','id');
        $allJobs = ['' => 'Select Job'] + $allJobs->all();
        return view('companies.create')->with('allJobs',$allJobs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $jobid = $request->get('job_id');
       // if(empty($job_id)){
       //     print 'error';die;
        //}
        $companies = new Company([
            'name' => $request->get('name'),
            'city' => $request->get('city'),
            'adress' =>$request->get('adress'),
            'phone_number' =>$request->get('phone_number')
        ]);
        $companies->save();
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $companies = Company::find($id);
        return view('companies.show')->with('companies',$companies);
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
        $company = Company::find($id);
        return view('companies.edit')->with('company',$company);
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
        //
        //
        $this->validate($request,
            ['name' => 'required',
                'city' => 'required',
                'adress' => 'required',
            ]);

        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->city = $request ->input('city');
        $company->adress = $request->input('adress');
        $company->phone_number = $request->input('phone_number');
        $company->save();

        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $copany = Company::find($id);
        $copany ->delete();
        return redirect('companies');
    }
}
