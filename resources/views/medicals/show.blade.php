@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Medical Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{ Form::model($medical, array('method' => 'DELETE', 'route' => array('medicals.destroy', $medical->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('patient_id', 'Patient:') }}
                        {{ Form::select('patient_id', $patients, null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('patient_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('patient_id') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('date', 'Date:') }}
                        {{ Form::text('date', date('d-M-Y H:m'),['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('date'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('doctor_id', 'Doctor:') }}
                        {{ Form::select('doctor_id', $doctors, null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('doctor_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('doctor_id') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('diagnose', 'Diagnose:') }}
                        {{ Form::textarea('diagnose',null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('diagnose'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('diagnose') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::checkbox('finished', null, null, ['disabled']) }} Finished?
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::button('<i class="fa fa-trash-o"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger')) }}

                    <a href="{{route('medicals.edit',$medical->id)}}" class="btn btn-info">
                        <i class="fa fa-pencil"></i> Edit </a>
                    <a href="{{route('medicals.index')}}" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Back </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop