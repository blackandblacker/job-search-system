@extends('layouts.app')


@section('content')
    <h1>Create a city</h1>

    @if (count($errors)>0)
        <ul>

            @foreach($errors->all() as $error)

                <li class="alert alert-danger">{{$error}}</li>
            @endforeach

        </ul>
    @endif
    {!! Form::open(['action'=> 'CityController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('city_name','City Name')}}
        {{Form::text('city_name','',['class' => 'form-control','placeholder' => 'city name'])}}
    </div>
    <div class="form-group">
        {{Form::label('country','City Location')}}
        {{Form::text('country','',['class' => 'form-control','placeholder' => 'City Location'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


@endsection