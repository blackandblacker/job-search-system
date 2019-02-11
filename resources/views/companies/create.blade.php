@extends('layouts.app')


@section('content')
    <h1>Create a city</h1>
    @if (count($errors)>0)
        <ul>

            @foreach($errors->all() as $error)

                <li class="alert alert-danger">{{$error}}</li>
            @endforeach

        </ul>
    @endif
    {!! Form::open(['action'=> 'CompanyController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('name','Company Name')}}
        {{Form::text('name','',['class' => 'form-control','placeholder' => 'company name'])}}
    </div>
    <div class="form-group">
        {{Form::label('city','Company Location')}}
        {{Form::text('city','',['class' => 'form-control','placeholder' => 'Company Location'])}}
    </div>
    <div class="form-group">
        {{Form::label('adress','Company Address')}}
        {{Form::text('adress','',['class' => 'form-control','placeholder' => 'Company Address'])}}
    </div>
    <div class="form-group">
        {{Form::label('phone_number','Company PhoneNumber')}}
        {{Form::text('phone_number','',['class' => 'form-control','placeholder' => 'Company PhoneNumber'])}}
    </div>




    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


@endsection