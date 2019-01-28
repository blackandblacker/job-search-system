@extends('layouts.app')


@section('content')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">

                <h1>{{$companies->name}}</h1>
                <hr>
                <small>Company location:<strong> {{$companies->city}}</strong></small>
                <br>
                <small>Company Address:<strong> {{$companies->adress}} </strong>  </small>
                <br>
                <small>Company Phone-Number:<strong> {{$companies->phone_number}} </strong>  </small>
                <br>
                <small>Added on:<strong> {{$companies->created_at}}</strong></small>
                <hr>

                <a href="/companies" class="btn btn-primary">Go back</a>

                @if(!Auth::guest())
                    <a href="/companies/{{$companies->id}}/edit" class="btn btn-primary">Edit</a>

                    {!! Form::open(['action'=>['CompanyController@destroy',$companies->id],'method' => 'POST','class' => 'pull-right','style' => 'margin-top:5px;']) !!}
                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                    {{Form::hidden('_method','DELETE' )}}


                    {!! Form::close() !!}
                @endif
            </li>
        </ul>
    </div>
@endsection