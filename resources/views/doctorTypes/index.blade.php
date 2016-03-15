@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 margin-bottom-20">
            <a href="{{route('doctorTypes.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Add new doctor type</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Doctor types</h3>

                    {{--<div class="box-tools">--}}
                    {{--<div class="input-group input-group-sm" style="width: 150px;">--}}
                    {{--<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">--}}

                    {{--<div class="input-group-btn">--}}
                    {{--<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Action
                                </th>
                                <th>
                                    Name
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($doctorTypes->count())
                                @foreach ($doctorTypes as $doctorType)
                                    <tr>
                                        <td>
                                            <a href="{{route('doctorTypes.edit',$doctorType->id)}}"
                                               class="btn btn-info">
                                                <i class="fa fa-pencil"></i> Edit </a>

                                            <a href="{{route('doctorTypes.destroy',$doctorType->id)}}"
                                               class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete </a>
                                        </td>
                                        <td>
                                            {{  $doctorType->name }}
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset("scripts/datatables.js") }}"></script>
@endsection