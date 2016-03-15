@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit medical</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{ Form::model($medical, array('method' => 'PATCH', 'route' => array('medicals.update', $medical->id))) }}
                <div class="box-body">
                    @if(Auth::check() && !Auth::user()->IsDoctor()){
                    <div class="form-group">
                        {{ Form::label('patient_id', 'Patient:') }}
                        {{ Form::select('patient_id', $patients, null,['class'=>'form-control']) }}
                        @if ($errors->has('patient_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('patient_id') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('date', 'Date:') }}
                        {{ Form::text('date', date('d.m.Y H:m'),['class'=>'form-control']) }}
                        @if ($errors->has('date'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('doctor_id', 'Doctor:') }}
                        {{ Form::select('doctor_id', $doctors, null,['class'=>'form-control']) }}
                        @if ($errors->has('doctor_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('doctor_id') }}</strong>
                                </span>
                        @endif
                    </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('diagnose', 'Diagnose:') }}
                        {{ Form::textarea('diagnose',null,['class'=>'form-control']) }}
                        @if ($errors->has('diagnose'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('diagnose') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::checkbox('finished') }} Finished?
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    <a href="{{route('medicals.index')}}" class="btn btn-default"> Cancel </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#date").datetimepicker({
                format: 'DD.MM.YYYY HH:mm'
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('scripts/medical.js') }}"></script>
@endsection