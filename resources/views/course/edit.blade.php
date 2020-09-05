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
                <h3 class="box-title">Edit Course</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card">

                <div class="card-body">
                    <form role="form" method="post" action="{{ route('courses.update',$course->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">course Name</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter course Name"
                                            name="name" value="{{ $course->name }}">
                                        @if($errors->has('name'))
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">course Level</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter course Level"
                                            name="level" value="{{ $course->level  }}">
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
                                        <label for="exampleInputEmail1">course Description</label>
                                        <textarea class="form-control" name="description">{{ $course->description }}</textarea>
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
</div>

<div class="col-md-2" style="margin-top:80px">
        @foreach ($batches as $batch)
        {{ $batch->time}}<br>
       
        <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#myModal{{$loop->index }}">
            Delete
        </button>
        <!-- The Modal -->
        <div class="modal" id="myModal{{ $loop->index }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            {{ $course->time }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Are you sure want to Delete ?
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button"  data-dismiss="modal">Close</button>
                        <form method="post" action="{{ route('batches.destroy', $batch->id) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="submit" class="btn btn-danger"">
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#update{{$loop->index }}">
            update
        </button>
        <!-- The Modal -->
        <div class="modal" id="update{{ $loop->index }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            {{ $course->time }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="post" action="{{ route('batches.update', $batch->id) }}">
                            @csrf
                            @method('put')
                           
                            <input type="hidden" value="{{ $batch->course_id }}" name="course->id">
                            <div class="form-group">
                                        <label for="exampleInputEmail1">Batch Time</label>
                            <input type="text" class="form-control" value="{{ $batch->time }}" name="time">
                            @if($errors->has('time'))
                                        <strong class="text-danger">{{ $errors->first('time') }}</strong>
                                        @endif
                            </div>
                        
                            <input type="submit" value="submit" class="btn btn-danger"">
                           
                        </form>
                      
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button"  data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
