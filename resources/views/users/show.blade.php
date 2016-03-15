@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{ Form::model($user, array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('username', 'Username:') }}
                        {{ Form::text('username',null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('username'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                        @endif
                    </div>
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
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::text('email',null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('user_role_id', 'Role:') }}
                        {{ Form::select('user_role_id', $roles, null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('user_role_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('user_role_id') }}</strong>
                                </span>
                        @endif
                    </div>
                    @if($user->doctor_type_id != null)
                    <div class="form-group">
                        {{ Form::label('doctor_type_id', 'Doctor Type:') }}
                        {{ Form::select('doctor_type_id', $doctorTypes, null,['class'=>'form-control', 'disabled']) }}
                        @if ($errors->has('doctor_type_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('doctor_type_id') }}</strong>
                                </span>
                        @endif
                    </div>
                    @endif
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::button('<i class="fa fa-trash-o"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger')) }}

                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">
                        <i class="fa fa-pencil"></i> Edit </a>
                    <a href="{{route('users.index')}}" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Back </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop