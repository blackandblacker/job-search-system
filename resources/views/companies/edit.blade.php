@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Edit Company</h1>
        @if (count($errors)>0)
            <ul>

                @foreach($errors->all() as $error)

                    <li class="alert alert-danger">{{$error}}</li>
                @endforeach

            </ul>
        @endif
        {!! Form::open(['action'=> ['CompanyController@update',$company->id],'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Position Name')}}
            {{Form::text('name',$company->name,['class' => 'form-control','placeholder' => 'position name'])}}
        </div>

        <div class="form-group">
            {{Form::label('city','Company Location')}}
            {{Form::text('city',$company->city,['class' => 'form-control','placeholder' => 'Company location'])}}
        </div>
        <div class="form-group">
            {{Form::label('adress','Company Adress')}}
            {{Form::text('adress',$company->adress,['class' => 'form-control','placeholder' => 'Company adress'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone_number','Company PhoneNumber')}}
            {{Form::text('phone_number',$company->phone_number,['class' => 'form-control','placeholder' => 'Company PhoneNumber'])}}
        </div>


        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

    </div>
@endsection