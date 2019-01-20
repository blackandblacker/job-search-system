@extends('layouts.app')

@section('content')

    <form method="post" action="{{url('images')}}" enctype="multipart/form-data">
        <div class="form-group row">
            {{csrf_field()}}
            <label>Image Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                       placeholder="imageDescription" name="imageDescription">
            </div>
        </div>
        <div class="form-group row">
            <label for="customImage">Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control form-control-lg" id="customImage"
                       placeholder="customImage" name="customImage">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2"></div>
            <input type="submit" class="btn btn-primary">
        </div>
    </form>

@endsection