@extends('layouts.app')


@section('content')
    <div class="container">
    <h1>Edit Job</h1>
    {!! Form::open(['action'=> ['JobsController@update',$job->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('position','Position Name')}}
        {{Form::text('position',$job->position,['class' => 'form-control','placeholder' => 'position name'])}}
    </div>

        <div class="form-group">
            {{Form::label('city','Job Location')}}
            {{Form::text('city',$job->city,['class' => 'form-control','placeholder' => 'job location'])}}
        </div>

    <div class="form-group">
        {{Form::label('job_company','Company')}}
        {{Form::text('job_company',$job->company,['class' =>'form-control','placeholder' =>'Company'])}}

    </div>

    <div class="form-group">
        {{Form::label('job_description','Job Description')}}
        {{Form::textarea('job_description',$job->job_description,['class' => 'form-control','placeholder' => 'Job Description'])}}
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    </div>
@endsection