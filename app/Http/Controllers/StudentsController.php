<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('details')->get();
        return view('students/index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'number' => ['required'],
            'course' => ['required']
        ]);

        $result = DB::table('details')->insert([
            'student_name' => $request->name,
            'student_email' => $request->email,
            'phone_number' => $request->number,
            'course' => $request->course
        ]);

        if ($result) {
            return back()->with('success', 'Student has been added');
        } else {
            return back()->with('failed', 'Student has failed to add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::table('details')->find($id);
        return view('students/edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'number' => ['required'],
            'course' => ['required']
        ]);

        $result = DB::table('details')->whereId($id)->update([
            'student_name' => $request->name,
            'student_email' => $request->email,
            'phone_number' => $request->number,
            'course' => $request->course
        ]);

        if ($result) {
            return redirect()->route('edit_student', $id)->with('success', 'Student has been updated');
        } else {
            return redirect()->route('edit_student', $id)->with('failed', 'Nothing to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DB::table('details')->whereId($id)->delete();

        if ($result) {
            return redirect()->route('show_students')->with('success', 'Student has been deleted');
        } else {
            return redirect()->route('show_students')->with('failed', 'Student has failed to delete');
        }
    }
}
