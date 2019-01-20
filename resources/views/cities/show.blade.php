@extends('layouts.app')


@section('content')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">

                <h1>{{$city->city_name}}</h1>
                <hr>
                <small>City location: {{$city->country}}</small>
                <hr>
                <small>Added on: {{$city->created_at}}</small>
                <hr>
                <a href="/cities" class="btn btn-primary">Go back</a>

                <a href="/cities/{{$city->id}}/edit" class="btn btn-primary">Edit</a>




                {!! Form::open(['action'=>['CityController@destroy',$city->id],'method' => 'POST','class' => 'pull-right']) !!}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                {{Form::hidden('_method','DELETE' )}}


                {!! Form::close() !!}
            </li>
        </ul>
    </div>
@endsection