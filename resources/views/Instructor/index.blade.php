@extends('layouts.adminapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="margin-top:20px">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">instructor</h4>

                    <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;margin-left:1000px">
                                <a class="btn btn-sm btn-primary" href="{{ route('users.create') }}">
                                    user
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
                            <th>Email</th>
                            <th>Type</th>
                            <th>Create_at Date</th>

                            <th>Status</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                        @foreach ($Users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->created_at->format('d-M-Y') }}</td>
                            <td><a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#remove{{ $user->id }}">
                                    Remove
                                </button>

                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal fade" id="remove{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="remove{{ $user->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="remove{{ $user->id }}Label">
                                                        {{ $user->title }}</h5>
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
