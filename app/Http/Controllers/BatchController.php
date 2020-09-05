<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    

    public function getBatch(Request $request)
    {
       $request->course;

       $course_id = Course::where('name',$request->course)->first();
      
       $batches = Batch::where('course_id',$course_id->id)->get();
       
            echo  "<select name='batch' class='form-control'>";
       foreach ($batches as  $value) {
           echo "<option value='".$value->time."'>".$value->time."</option>";
       }
       
      echo  "</select>";

      

    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        $data = $request->validate([
            'time' => 'required',
            'course_id' => 'required',
        ]);

        $batch->update();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return back();
    }
}
