@extends('layouts.app')

@section('content')
    @if(Auth::check() && Auth::user()->user_role_id !== 2)
    <div class="row margin-bottom-20">
        <div class="col-md-12">
            <a href="{{route('medicals.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Add new medical</a>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a aria-expanded="false" class="tabs" data-id="0" href="#ongoing" data-toggle="tab">Ongoing</a></li>
                    <li class=""><a aria-expanded="false" class="tabs" data-id="1" href="#finished" data-toggle="tab">Finished</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="ongoing">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="ongoing-body"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="finished">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="finished-body"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" >

        (function() {

            $('.tabs').on('click', function() {

                var detectTab = $(this).data('id');
                $.getJSON("medicals/getData/" + detectTab, function(data) {
                    console.log(data);
                    var body = $('#ongoing-body');
                    if(detectTab === 1)
                        body = $('#finished-body')
                    var result = "";
                    $.each(data, function(index, value) {
                        var buttons = '<a href="/medicals/' + value.id + '/edit" type="button" class="btn-xs btn-default"><i class="fa fa-pencil"></i>Edit</a>' +
                                        '<a href="/medicals/' + value.id + '" type="button" class="btn-xs btn-default"><i class="fa fa-trash-o"></i>Delete</a>';

                        if(detectTab === 1)
                            buttons = "";
                        result  += '<div class="col-md-6"><div class="box box-primary custom-shadow">' +
                                        '<div class="box-header with-border"><h3 class="box-title">' + value.patient.name + ' ' + value.patient.last_name + '</h3>' +
                                            '<div class="box-tools pull-right">' + buttons +
                                            '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>' +
                                            '<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button></div>' +
                                        '</div><div class="box-body"><p>Date: ' + value.date + '</p><hr/>' +
                                        '<p>Doctor: ' + value.doctor.name + ' ' + value.doctor.last_name + '</p></div>' +
                                        '<div class="box-footer">' + value.diagnose +  '</div></div>' +
                                    '</div>';
                    });

                    body.html(result);
                });

            });

            $('.tabs:first').trigger('click');

        })();

    </script>
@stop