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
           Description:<strong> {{$job->job_description}}</strong>
        </div>
        <hr>
        <small>Added on:<strong> {{$job->created_at}}</strong> </small>
        <hr>
        <small>Job location:<strong> {{$job->city}}</strong></small>
        <hr>

            <a href="/jobs" class="btn btn-primary">Go back</a>
        @if(!Auth::guest())
        <a href="/jobs/{{$job->id}}/edit" class="btn btn-primary">Edit</a>

        {!! Form::open(['action'=>['JobsController@destroy',$job->id],'method' => 'POST','class' => 'pull-right','style' => 'margin-top:5px;']) !!}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {{Form::hidden('_method','DELETE' )}}


        {!! Form::close() !!}
            @endif
        </li>
    </ul>
</div>
@endsection