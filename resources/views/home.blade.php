@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                Welcome {{ Auth::user()->name }} {{ Auth::user()->last_name }}
            </div>
        </div>
    </div>
@stop
