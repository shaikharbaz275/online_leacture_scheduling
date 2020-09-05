<?php

namespace App\Http\Controllers;

use App\Course;
use App\Batch;

use Illuminate\Http\Request;
use App\Utilities\FileUpload;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'level' => 'required',
            'time' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        $fileupload = new FileUpload();
        $data['image'] = $fileupload->upload($data['image']);


        $course = Course::create([
            'name' => $data['name'],
            'level' => $data['level'],
            'image' => $data['image'],
            'description' => $data['description']
        ]);


        foreach ($data['time'] as  $value) {

            $post = Batch::create([
                'time' => $value,
                'course_id' => $course->id,
            ]);
        }

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $batches = Batch::where('course_id',$course->id)->get();
        return view('course.show',compact('course','batches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {     
         $batches = Batch::where('course_id',$course->id)->get();
        return view('course.edit',compact('course','batches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => 'required',
            'level' => 'required',
            'time' => 'nullable',
            'image' => 'nullable',
            'description' => 'required'
        ]);


        if (isset($data['image'])) {
            $fileupload = new FileUpload();
            $data['image'] = $fileupload->upload($data['image']);
        } else {
            $data['image'] = $course->image;
        }
        $course->save([
            'name' => $data['name'],
            'level' => $data['level'],
            'image' => $data['image'],
            'description' => $data['description']
        ]);

        if (isset($data['time'])) {

            foreach ($data['time'] as  $value) {

                $post = Batch::create([
                    'time' => $value,
                    'course_id' => $course->id,
                ]);
            }
        }
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back();
    }
}
