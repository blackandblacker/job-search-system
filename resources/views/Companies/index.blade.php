@extends('layouts.app')


@section('content')
    @if(count($companies) > 0)
        @foreach($companies as $company)

            <ul class="list-group" style="padding-left:25px;padding-right: 25px;padding-top: 10px;">
                <li class="list-group-item">
                    <h3> {{$company->name}}</h3>
                    <small>Posted on:<strong> {{$company->created_at}} </strong>  </small>
                    <br>
                    <small>Posted by:<strong> {{$company->city}} </strong> </small>
                    <br>
                    <small>Location:<strong> {{$company->adress}} </strong></small>
                    <hr>
                    <a href="/jobs/{{$company->id}}" class="btn btn-primary">Show</a>
                </li>
            </ul>
        @endforeach
        {{$company->links()}}
    @else
        <p>No companies found</p>
    @endif


@endsection