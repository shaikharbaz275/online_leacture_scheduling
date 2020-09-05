@extends('layouts.adminapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="margin-top:20px">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">courses</h4>

                    <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;margin-left:1000px">
                                <a class="btn btn-sm btn-primary" href="{{ route('courses.create') }}">
                                    course
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Sr</th>
                            <th>Name</th>
                            <th>Level</th>
                            
                            <th>Create_at Date</th>

                            <th>Show</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->level }}</td>
                            <td>{{ $course->created_at->format('d-M-Y') }}</td>
                            <td><a href="{{ route('courses.show',$course->id) }}" class="btn btn-success">Show</a></td>
                           
                            <td><a href="{{ route('courses.edit',$course->id) }}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#remove{{ $course->id }}">
                                    Remove
                                </button>

                                <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal fade" id="remove{{ $course->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="remove{{ $course->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="remove{{ $course->id }}Label">
                                                        {{ $course->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to remove this iteam ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
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
