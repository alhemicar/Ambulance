@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Patient Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{ Form::model($patient, array('method' => 'DELETE', 'route' => array('patients.destroy', $patient->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name',null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name:') }}
                        {{ Form::text('last_name',null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('place_id', 'Place:') }}
                        {{ Form::select('place_id', $places, null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('place_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('place_id') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('umsn', 'UMSN:') }}
                        {{ Form::text('umsn',null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('umsn'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('umsn') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('details', 'Details:') }}
                        {{ Form::textarea('details',null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('details'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('details') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::button('<i class="fa fa-trash-o"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger')) }}

                    <a href="{{route('patients.edit',$patient->id)}}" class="btn btn-info">
                        <i class="fa fa-pencil"></i> Edit </a>
                    <a href="{{route('patients.index')}}" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Back </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop