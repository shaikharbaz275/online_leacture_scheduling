@extends('layouts.userapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="margin-top:20px">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">Schedules Batch Time</h4>

                    <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;margin-left:1000px">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Sr</th>
                            <th>Instructor</th>
                            <th>Course</th>
                            <th>Batch Time </th>
                            <th>Create_at Date</th>
                           
                        </tr>
                        @foreach ($schedules as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->user }}</td>
                            <td>{{ $user->course }}</td>
                            <td>{{ $user->batch }}</td>
                            <td>{{ $user->created_at->format('d-M-Y') }}</td>
                           
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection
