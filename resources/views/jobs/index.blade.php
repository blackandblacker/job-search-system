@extends('layouts.app')


@section('content')
    <div class="col-md-4" >
        <form action="/search" method="GET" style="margin-left: 10px">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>
    </div>
    <br>
    <a class="btn btn-primary" href="{{URL::to('jobs/create')}}" style="margin-left: 25px">Create a job</a>



    @if(count($jobs) > 0)
        @foreach($jobs as $job)

            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <ul class="list-group" style="padding-left:25px;padding-right: 25px;padding-top: 10px;">
                        <li class="list-group-item">
                            <div class="col-md-4 col-sm-4">
                                <img style="width: 100%" src="/storage/cover_images/{{$job->cover_image}}">
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h3> {{$job->position}}</h3>
                            <small>Posted on:<strong> {{$job->created_at}} </strong>  </small>
                            <br>
                            <small>Location:<strong> {{$job->city}} </strong></small>
                            <br>
                            <small>Company_ID:<strong> <a href="{{URL::to('/companies')}}">{{$job->company_id}} </a> </strong></small>
                            <hr>
                            <a href="/jobs/{{$job->id}}" class="btn btn-primary">Show</a>
                        </li>
                    </ul>
                </div>
            </div>


        @endforeach
        {{$jobs->links()}}
    @else
        <p>No jobs found</p>
    @endif


@endsection