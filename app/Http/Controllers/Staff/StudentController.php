<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Address;
use App\Models\StudentHaSDetail;
use DB;
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
        $datas = DB::table('students')
                    ->join('addresses','students.address_id','=','addresses.id')
                    ->select('students.*','addresses.name','addresses.id as addressID')
                    ->orderBy('students.id','DESC')
                    ->get();
                    // dd($datas);
        $students = Student::where('is_active',true)->with('getAddress')->get();
        $lol = Student::select(Student::raw('count(*) as student_count,is_active'))->groupBy('is_active')->get();
        $check = DB::table('addresses')
                    // ->rightJoin('students','addresses.id','=','students.address_id')
                    ->crossJoin('students')
                    ->get();
        return view('staff.student.index', compact('datas','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses = Address::select('id','name')->get();
        return view('staff.student.create', compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('students')->insert([
        //     'user_name' => $request->user_name,
        //     'address_id' => $request->address_id,
        //     'phone_no' => $request->phone_no,
        //     'age' => $request->age,
        //     'resolved_by' => Auth::user()->id,
        // ]);
        $datas = Student::create([
            'user_name' => $request->user_name,
            'address_id' => $request->address_id,
            'phone_no' => $request->phone_no,
            'age' => $request->age,
            'resolved_by' => Auth::user()->id,
        ]);
        if($datas->exists)
        {
            $detail = StudentHaSDetail::create([
                'student_id' => $datas->id,
                'description' => $request->description,
            ]);
        }
        return redirect()->route('staff.student.index');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::find($id);
        $students->delete();
        return redirect()->route('staff.student.index'); 
    }
}
