@extends('layouts.app')


@section('content')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">

                <h1>{{$companies->name}}</h1>
                <hr>
                <small>Company location:{{$companies->city}}</small>
                <hr>
                <small>Added on:{{$companies->created_at}}</small>
                <hr>
                <a href="/companies" class="btn btn-primary">Go back</a>

                @if(!Auth::guest())
                    <a href="/companies/{{$companies->id}}/edit" class="btn btn-primary">Edit</a>

                    {!! Form::open(['action'=>['CompanyController@destroy',$companies->id],'method' => 'POST','class' => 'pull-right']) !!}
                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                    {{Form::hidden('_method','DELETE' )}}


                    {!! Form::close() !!}
                @endif
            </li>
        </ul>
    </div>
@endsection