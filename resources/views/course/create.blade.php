@extends('layouts.adminapp')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-2">
    </div>
    <div class="col-md-8" style="margin-top:20px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border" style="margin-top:20px">
                <h3 class="box-title">Create Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card">

                <div class="card-body">
                    <form role="form" method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course Name</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Course Name"
                                            name="name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course Level</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Course level"
                                            name="level" value="{{ old('level') }}">
                                        @if($errors->has('level'))
                                        <strong class="text-danger">{{ $errors->first('level') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" class="form-control"  name="image" value="{{ old('image') }}">
                                        @if($errors->has('image'))
                                        <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                        @if($errors->has('description'))
                                        <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                <INPUT type="button" value="Add Batch" class="btn btn-primary" onclick="add()"/>
                                </div>
                                @if($errors->has('time'))
                                        <strong class="text-danger">{{ $errors->first('time') }}</strong>
                                        @endif
                                </div><br>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                <span id="fooBar">&nbsp;</span><br>
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
    <!-- /.box-body -->
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
@section('js')

<SCRIPT language="javascript">
function add(type) {

	//Create an input type dynamically.
	var element = document.createElement("input");

	//Assign different attributes to the element.
	element.setAttribute("type", "Text");
	element.setAttribute("name", "time[]");
    element.setAttribute("placeholder", "Enter Batch");

    var br = document.createElement("br");
    var br2 = document.createElement("br");


	var foo = document.getElementById("fooBar");

	//Append the element in page (in span).
    
	foo.appendChild(element);
    foo.appendChild(br);
    foo.appendChild(br2);

}
</SCRIPT>

@endsection
@endsection

