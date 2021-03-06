@extends('layouts.app')


@section('content')
    <div class="container">
    <h1>Edit Job</h1>

        @if (count($errors)>0)
            <ul>

                @foreach($errors->all() as $error)

                    <li class="alert alert-danger">{{$error}}</li>
                @endforeach

            </ul>
        @endif
    {!! Form::open(['action'=> ['JobsController@update',$job->id],'method'=>'POST','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('position','Position Name')}}
        {{Form::text('position',$job->position,['class' => 'form-control','placeholder' => 'position name'])}}
    </div>

        <div class="form-group">
            {{Form::label('city','Job Location')}}
            {{Form::text('city',$job->city,['class' => 'form-control','placeholder' => 'job location'])}}
        </div>
    <div class="form-group">
        {{Form::label('job_description','Job Description')}}
        {{Form::textarea('job_description',$job->job_description,['class' => 'form-control','placeholder' => 'Job Description'])}}
    </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    </div>
@endsection