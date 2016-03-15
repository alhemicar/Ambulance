@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 margin-bottom-20">
            <a href="{{route('patients.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Add new patient</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Patients</h3>
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
                                <th>
                                    UMSN
                                </th>
                                <th>
                                    Place
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($patients->count())
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>
                                            <a href="{{route('patients.edit',$patient->id)}}" class="btn btn-info">
                                                <i class="fa fa-pencil"></i> Edit </a>

                                            <a href="{{route('patients.destroy',$patient->id)}}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete </a>
                                        </td>
                                        <td>
                                            {{  $patient->name }} {{ $patient->last_name }}
                                        </td>
                                        <td>
                                            {{  $patient->umsn }}
                                        </td>
                                        <td>
                                            {{  $patient->place->name }}
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