@extends('layouts.adminapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="margin-top:20px">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">course Details</h4>

                    <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;margin-left:1000px">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th scope="row">Name</th>
                          <td>{{ $course->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Level</th>
                          <td>{{ $course->level}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Image</th>
                            <td><img src="/upload/{{ $course->image}}" width="200px" height="200px"></td>
                          </tr>
                          <tr>
                            <th scope="row">Description</th>
                            <td>{{ $course->description}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Batch Time</th>
                            
                            <td>
                                @foreach ($batches as $item)
                                {{ $item->time}} <br>
                                @endforeach
                            </td>

                           
                          </tr>
                          
                        </tbody>
                      </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection
