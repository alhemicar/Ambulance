@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit place</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{ Form::model($patient, array('method' => 'PATCH', 'route' => array('patients.update', $patient->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name',null,['class'=>'form-control', 'required']) }}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name:') }}
                        {{ Form::text('last_name',null,['class'=>'form-control', 'required']) }}
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('place_id', 'Place:') }}
                        {{ Form::select('place_id', $places, null,['class'=>'form-control', 'required']) }}
                        @if ($errors->has('place_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('place_id') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('umsn', 'UMSN:') }}
                        {{ Form::text('umsn',null,['class'=>'form-control', 'required']) }}
                        @if ($errors->has('umsn'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('umsn') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('details', 'Notes:') }}
                        {{ Form::textarea('details',null,['class'=>'form-control']) }}
                        @if ($errors->has('details'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('details') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    <a href="{{route('patients.index')}}" class="btn btn-default"> Cancel </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript" src="{{ asset('scripts/patient.js') }}"></script>
@endsection