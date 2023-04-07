<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Response;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return Response::json($students);
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
        $students = Student::create([
            'user_name' => $request['user_name'],
            'address_id' => $request['address_id'],
            'phone_no' => $request['phone_no'],
            'age' => $request['age'],
            'resolved_by' => Auth::user()->id,
        ]);
        return response()->json([
            'message' => 'Student created',
            'status' => 'success',
            'data' => $students,
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request,$id)
    // {
    //     $students = Student::find($id);
    //     $students->user_name = $request->user_name;
    //     $students->address_id = $request->address_id;
    //     $datas = $students->update();
    //     if($datas){
    //         $notification = array(
    //         'message' => 'Data updated successfully!',
    //         'alert-type' => 'success'
    //         );
    //     }else{
    //         $notification = array(
    //         'message' => 'Data could not be updated!',
    //         'alert-type' => 'error'
    //         );
    //     }
    //     return response()->json($notification);

    // }

    public function update(Request $request, Student $student)
    {
        $main_data = $request->all();
        $datas = $student->update($main_data);
        if($datas){
            $notification = array(
            'message' => 'Data updated successfully!',
            'alert-type' => 'success'
            );
        }else{
            $notification = array(
            'message' => 'Data could not be updated!',
            'alert-type' => 'error'
            );
        }
        return response()->json($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($student->delete()){
            $notification = array(
              'message' => 'data is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => 'data could not be deleted!',
              'status' => 'error'
          );
        }
        return response()->json($notification);
    }
}
