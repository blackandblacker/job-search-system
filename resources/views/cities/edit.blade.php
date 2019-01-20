@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Edit City</h1>
        {!! Form::open(['action'=> ['CityController@update',$city->id],'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('city_name','City Name')}}
            {{Form::text('city_name',$city->city_name,['class' => 'form-control','placeholder' => 'city name'])}}
        </div>
        <div class="form-group">
            {{Form::label('country','City Location')}}
            {{Form::textarea('country',$city->country,['class' => 'form-control','placeholder' => 'City Location'])}}
        </div>


        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

    </div>
@endsection