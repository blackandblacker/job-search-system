@extends('layouts.app')


@section('content')
    <div class="col-md-4">
        <form action="/search2" method="GET" style="margin-left: 10px">
            <div class="input-group">
                <input type="search" name="search2" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>
    </div>
    <br>
    @if(auth::check())
    <a class="btn btn-primary" href="{{URL::to('cities/create')}}" style="margin-left: 25px">Create a city</a>
    @endif
    @if(count($cities) > 0)
        @foreach($cities as $city)


            <ul class="list-group" style="padding-left:25px;padding-right: 25px;padding-top: 10px;">
                <li class="list-group-item">
                    <h3> {{$city->city_name}}</h3>
                    <small>Posted on:<strong> {{$city->created_at}} </strong>  </small>
                    <br>
                    <small>Location:<strong> {{$city->country}} </strong></small>
                    <hr>
                    <a href="/cities/{{$city->id}}" class="btn btn-primary">Show</a>
                </li>
            </ul>
        @endforeach
        {{$cities->links()}}
    @else
        <p>No cities found</p>
    @endif


@endsection