@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit user</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('username', 'Username:') }}
                        {{ Form::text('username',null,['class'=>'form-control', 'readonly']) }}
                        @if ($errors->has('username'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name',null,['class'=>'form-control']) }}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name:') }}
                        {{ Form::text('last_name',null,['class'=>'form-control']) }}
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::text('email',null,['class'=>'form-control']) }}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                    @if(Auth::check() && Auth::user()->IsAdmin())
                    <div class="form-group">
                        {{ Form::label('user_role_id', 'Role:') }}
                        {{ Form::select('user_role_id', $roles, null,['class'=>'form-control']) }}
                        @if ($errors->has('user_role_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_role_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('doctor_type_id', 'Doctor Type:') }}
                        {{ Form::select('doctor_type_id', $doctorTypes, null,['class'=>'form-control']) }}
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
                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    <a href="{{route('users.index')}}" class="btn btn-default"> Cancel </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript" src="{{ asset("scripts/user.js") }}"></script>
@endsection