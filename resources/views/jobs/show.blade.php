@extends('layouts.app')


@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">

        <h1>{{$job->position}}</h1>

        <div>
           Description: {{$job->job_description}}
        </div>
        <hr>
        <small>Added on: {{$job->created_at}}</small>
        <hr>
        <small>Company: {{$job->company}}</small>
        <hr>
        <small>Job location: {{$job->city}}</small>
        <hr>

            <a href="/jobs" class="btn btn-primary">Go back</a>

        <a href="/jobs/{{$job->id}}/edit" class="btn btn-primary">Edit</a>




        {!! Form::open(['action'=>['JobsController@destroy',$job->id],'method' => 'POST','class' => 'pull-right']) !!}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {{Form::hidden('_method','DELETE' )}}


        {!! Form::close() !!}
        </li>
    </ul>
</div>
@endsection