<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Children;
use App\Models\Group;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $now = date('Y-m-d', strtotime(now()));
        $groups = Group::all();
        $id = $request['id'];
        $children = Children::where('group_id', $id)->get();
        $child_id = [];
        foreach ($children as $child) {
            $child_id[] = $child->id;
        }
        $attendances = Attendance::whereIn('child_id', $child_id)->where('date',$now)->get();
        $attendances_child = [];
        foreach ($attendances as $attendance) {
            $attendances_child[] = $attendance->child_id;
        }
        return view('admin.attendance.index',compact('groups', 'children', 'attendances_child', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $status = $request['status'];
        $child = Children::where('group_id', $request['group_id'])->get();
        $child_id = [];
        foreach ($child as $value) {
            $child_id[] = $value['id'];
        }
        Attendance::where('date', date('Y-m-d', strtotime(now())))->whereIn('child_id', $child_id)->delete();
        if ($status)
        foreach ($status as $value) {
            $attendance = new Attendance();
            $attendance->child_id = $value;
            $attendance->date = date('Y-m-d', strtotime(now()));
            $attendance->status = 1;
            $attendance->save();
        }
        return redirect()->back()->with('success', 'Attendance has been taken successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
