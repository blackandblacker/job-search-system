@extends('layouts.app')


@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">

        <h1>{{$job->position}}</h1>

            <img style="width: 100%" src="/storage/cover_images/{{$job->cover_image}}">
            <br>
            <br>
        <div>
           Description: {{$job->job_description}}
        </div>
        <hr>
        <small>Added on: {{$job->created_at}}</small>
        <hr>
        <small>Job location: {{$job->city}}</small>
        <hr>

            <a href="/jobs" class="btn btn-primary">Go back</a>
        @if(!Auth::guest())
        <a href="/jobs/{{$job->id}}/edit" class="btn btn-primary">Edit</a>

        {!! Form::open(['action'=>['JobsController@destroy',$job->id],'method' => 'POST','class' => 'pull-right']) !!}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {{Form::hidden('_method','DELETE' )}}


        {!! Form::close() !!}
            @endif
        </li>
    </ul>
</div>
@endsection