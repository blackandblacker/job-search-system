@extends('layouts.app')


@section('content')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">

                <h1>{{$city->city_name}}</h1>
                <hr>
                <small>City location: <strong>{{$city->country}}</strong></small>
                <hr>
                <small>Added on: <strong>{{$city->created_at}}</strong></small>
                <hr>
                <a href="/cities" class="btn btn-primary">Go back</a>

                @if(!Auth::guest())
                <a href="/cities/{{$city->id}}/edit" class="btn btn-primary">Edit</a>

                {!! Form::open(['action'=>['CityController@destroy',$city->id],'method' => 'POST','class' => 'pull-right','style' => 'margin-top:5px;']) !!}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                {{Form::hidden('_method','DELETE' )}}


                {!! Form::close() !!}
                @endif
            </li>
        </ul>
    </div>
@endsection