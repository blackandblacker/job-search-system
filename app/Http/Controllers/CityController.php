<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search2(Request $request){

        $search = $request->get('search2');
        $cities = DB::table('cities')->where('city_name', 'like','%' .$search. '%')
            ->orwhere('country','like', '%' .$search. '%')
            ->paginate(5);
        return view ('cities.index',['cities' => $cities]);
    }

    public function index()
    {
        //
        $cities = City::orderBy('city_name','asc')->paginate(4);
        return view('cities.index',compact('cities','s'))->with('cities',$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cities.create');
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
            ['city_name' => 'required',
                'country' => 'required'
            ]);

        $city = new City();
        $city->city_name = $request->input('city_name');
        $city->country = $request->input('country');
        $city->save();

        return redirect('/cities');
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
        $city = City::find($id);
        return view('cities.show')->with('city',$city);
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
        $city = City::find($id);
        return view('cities.edit')->with('city',$city);
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
            ['city_name' => 'required',
                'country' => 'required'
            ]);

        $city = City::find($id);
        $city->city_name = $request->input('city_name');
        $city->country = $request ->input('country');
        $city->save();

        return redirect('cities');
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
        $city = City::find($id);
        $city->delete();
        return redirect('cities');
    }
}
