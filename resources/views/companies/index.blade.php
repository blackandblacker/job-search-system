@extends('layouts.app')


@section('content')
    <div class="col-md-4">
        <form action="/search3" method="GET" style="margin-left: 10px">
            <div class="input-group">
                <input type="search" name="search3" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        </form>
    </div>
    <br>
    <a class="btn btn-primary" href="{{URL::to('companies/create')}}" style="margin-left: 25px">Create a company</a>
    @if(count($companies) > 0)
        @foreach($companies as $company)


            <ul class="list-group" style="padding-left:25px;padding-right: 25px;padding-top: 10px;">
                <li class="list-group-item">
                    <h3> {{$company->name}}</h3>
                    <br>
                    <small>Location:<strong> {{$company->city}} </strong></small>
                    <br>
                    <small>Posted on:<strong> {{$company->created_at}} </strong>  </small>
                    <br>
                    <hr>
                    <a href="/companies/{{$company->id}}" class="btn btn-primary">Show</a>
                </li>
            </ul>
        @endforeach
        {{$companies->links()}}
    @else
        <p>No companies found</p>
    @endif


@endsection


