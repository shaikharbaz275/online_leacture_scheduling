@extends('layouts.adminapp')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-sm-1">
    </div>
    <div class="col-sm-6" style="margin-top:20px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border" style="margin-top:20px">
                <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card">

                <div class="card-body">
                    <form role="form" method="post" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Name</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter  Name"
                                            name="name" value="{{ $user->name }}">
                                        @if($errors->has('name'))
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Email</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Email"
                                            name="email" value="{{ $user->email  }}">
                                        @if($errors->has('prize'))
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        @endif
                                    </div>
                                </div>
                    
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">password</label>
                                        <input type="password" class="form-control"  name="password" value="">
                                        @if($errors->has('password'))
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>


</div>
<!-- /.box -->
</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
