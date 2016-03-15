@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New place</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{ Form::model($place, array('method' => 'DELETE', 'route' => array('places.destroy', $place->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['class'=>'form-control', 'disabled']) }}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::button('<i class="fa fa-trash-o"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger')) }}

                    <a href="{{route('places.edit',$place->id)}}" class="btn btn-info">
                        <i class="fa fa-pencil"></i> Edit </a>
                    <a href="{{route('places.index')}}" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Back </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop