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
                <h3 class="box-title">Assign Instructor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <div class="card">
                @if( Session::has( 'success' ))
            <div class="text-danger">{{ Session::get( 'success' ) }}</div>
                    
                @endif

                <div class="card-body">
                   
                    <form role="form" method="post" action="{{ route('schedules.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Instructor</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                                            @foreach ($users as $item)
                                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                                            @endforeach
                                           </select>
                                        @if($errors->has('user_id'))
                                        <strong class="text-danger">{{ $errors->first('user_id') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="date" class="form-control" placeholder="Enter date"
                                            name="date" id="date" value="{{ old('date') }}">
                                        @if($errors->has('date'))
                                        <strong class="text-danger">{{ $errors->first('date') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Course</label>
                                       
                                        <select class="form-control" id="course" name="course">
                                            <option value="">Select course</option>
                                            @foreach ($courses as $item)
                                        <option value="{{ $item->name}}">{{ $item->name}}</option>
                                            @endforeach
                                           </select>
                                        @if($errors->has('course'))
                                        <strong class="text-danger">{{ $errors->first('course') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Select Batch</label>
                                    <div id="batch">
                                </div>
                                       
                                        
                                        @if($errors->has('batch'))
                                        <strong class="text-danger">{{ $errors->first('batch') }}</strong>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
       
   
   
        $('#course').change(function() {
            
            var selectedCoure = $('#course').children("option:selected").val();
            if($('#course').val()=='')
            {

                alert("please Select Course")
            }
            else {
           
         
    $.ajax({
        method: 'post',
        url:'/batch',
        data:{
            'course':selectedCoure,
            '_token': $('input[name="_token"]').val(),

        },
        success: function (data) {
            $('#batch').html(data);
            
           
        },error:function(){
            console.log(data);
        }
    });
  

            } 
});

 
 });
    </script>
    
@endsection
@endsection
