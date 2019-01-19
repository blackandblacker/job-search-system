<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImagesUpload;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $image = Images::all();
        return view('images.index')->with('images',$image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImagesUpload $request)
    {
        //
        $path = $request->file('customImage')->store('public/sample-images');
        $image = new Images([
            'fileName' => basename($path),
            'imageDescription' => $request->get('imageDescription')
        ]);
        $image->save();
        return redirect('images');
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
        $image = Images::find($id);
        Storage::delete('public/sample-images'. $image->filenName);
        $image->delete();
        return redirect('images')->with('success','Image deleted successfully');
    }
}
