@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Companies
                        <a href="{{ URL::to('company') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @if ($errors->first('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif




                        <form method="post" action="{{url('company')}}">
                            {{csrf_field()}}
                            <input type="text" placeholder="name" name="name">
                            <input type="text" placeholder="city" name="company_city">
                            <input type="text" placeholder="job_id" name="job_id">



                            @if ($errors->first('job_id'))
                                <div class="alert alert-danger">{{ $errors->first('job_id') }}</div>
                            @endif

                            <?php if (!empty($allCompanies)):?>
                            <select name="job_id" class="form-control">
                                <?php foreach($allCompanies as $key => $value):?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php endif; ?>

                            <input type="submit" class="btn btn-primary">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
