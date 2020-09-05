<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       
        if(Auth::user()->type == "instructor")
        {  
            $schedules = Schedule::where('user_id',Auth::user()->id)->get();
        
        return view('schedule.instructor',compact('schedules'));
              
        }
       else {
         $schedules = Schedule::all();
        
        return view('schedule.index',compact('schedules'));
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return view('schedule.create',compact('users','courses'));
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
            'batch' => 'required',
            'user_id' => 'required',
            'course' => 'required',
            'date' => 'required'
        ]);

        $userdata = Schedule::where('user_id', $data['user_id'])->where('date', $data['date'])->first();


        if ($userdata != null) {

            return  Redirect::back()->withSuccess('Teacher already assignted On this date');
        }
        $batch = Schedule::where('batch', $data['batch'])
        ->where('date', $data['date'])
        ->where('course', $data['course'])
        ->first();
        if ($batch != null) {
            return   Redirect::back()->withSuccess('This Batch Already assignted on this date');
        }


        $user = User::find($data['user_id']);
        $data['user'] = $user->name;
        Schedule::create($data);

        return redirect()->route('schedules.index');
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return back();
    }
}
