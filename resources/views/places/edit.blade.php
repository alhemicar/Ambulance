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
                {{ Form::model($place, array('method' => 'PATCH', 'route' => array('places.update', $place->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required')) }}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    <a href="{{route('places.index')}}" class="btn btn-default"> Cancel </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript" src="{{ asset('scripts/places.js') }}"></script>
@endsection