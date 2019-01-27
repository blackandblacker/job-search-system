<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Storage;
use Session;
use DB;

class JobsController extends Controller
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
    public function search(Request $request){

        $search = $request->get('search');
        $jobs = DB::table('jobs')->where('position', 'like','%' .$search. '%')
            ->orwhere('city','like', '%' .$search. '%')
            ->paginate(5);
        return view ('jobs.index',['jobs' => $jobs]);
    }

    public function index()
    {


        //
        $jobs = Job::orderBy('position','asc')->paginate(4);
        return view('jobs.index',compact('jobs','s'))->with('jobs',$jobs);
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
             'job_description' => 'required',
              'cover_image' => 'image|nullable|max:1999'
            ]);

        //Handle file upload
        if($request->hasFile('cover_image')){

            //Get filename with extensions
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $job = new Job;
        $job->position = $request->input('position');
        $job->job_description = $request->input('job_description');
        $job->city = $request->input('job_city');
        $job->cover_image = $fileNameToStore;
        $job->save();

        Session::flash('success','Job successfully posted');

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

        //Handle file upload
        if($request->hasFile('cover_image')){

            //Get filename with extensions
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }

        $job = Job::find($id);
        $job->position = $request->input('position');
        $job->city = $request ->input('city');
        $job->job_description = $request->input('job_description');
        if($request->hasFile('cover_image')){
            $job->cover_image = $fileNameToStore;
        }
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
        if($job->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/cover_images/'.$job->cover_image);
        }
        $job->delete();
        return redirect('jobs');

    }
}
