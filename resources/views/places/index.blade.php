@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 margin-bottom-20">
            <a href="{{route('places.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Add new place</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Places</h3>

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
                            @if ($places->count())
                                @foreach ($places as $place)
                                    <tr>
                                        <td>
                                            <a href="{{route('places.edit',$place->id)}}" class="btn btn-info">
                                                <i class="fa fa-pencil"></i> Edit </a>

                                            <a href="{{route('places.destroy',$place->id)}}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete </a>
                                        </td>
                                        <td>
                                            {{  $place->name }}
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