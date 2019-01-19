@extends('layouts.app')


@section('content')
<h1>Post a Job</h1>
{!! Form::open(['action'=> 'JobsController@store','method'=>'POST']) !!}
<div class="form-group">
    {{Form::label('position','Position Name')}}
    {{Form::text('position','',['class' => 'form-control','placeholder' => 'position name'])}}
</div>
<div class="form-group">
    {{Form::label('job_city','Job Location')}}
    {{Form::text('job_city','',['class' => 'form-control','placeholder' => 'Job Location'])}}
</div>
<div class="form-group">
    {{Form::label('job_company','Company')}}
    {{Form::text('job_company','',['class' =>'form-control','placeholder' =>'Company'])}}

</div>
<div class="form-group">
    {{Form::label('job_description','Job Description')}}
    {{Form::textarea('job_description','',['class' => 'form-control','placeholder' => 'Job Description'])}}
</div>

{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}


@endsection