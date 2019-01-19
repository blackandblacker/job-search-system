<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use DB;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::orderBy('position','asc')->paginate(4);
        return view('jobs.index')->with('jobs',$jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,
            ['position' => 'required',
             'job_description' => 'required'
            ]);

        $job = new Job;
        $job->position = $request->input('position');
        $job->job_description = $request->input('job_description');
        $job->city = $request->input('city');
        $job->company = $request->input('job_company');
        $job->save();

        return redirect('/jobs');
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
        $job = Job::find($id);
        return view('jobs.show')->with('job',$job);
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
        $job = Job::find($id);
        return view('jobs.edit')->with('job',$job);
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
        $this->validate($request,
            ['position' => 'required',
                'job_description' => 'required'
            ]);

        $job = Job::find($id);
        $job->position = $request->input('position');
        $job->city = $request ->input('city');
        $job->company = $request ->input('job_company');
        $job->job_description = $request->input('job_description');
        $job->save();

        return redirect('/jobs');
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
        $job = Job::find($id);
        $job->delete();
        return redirect('jobs');

    }
}
