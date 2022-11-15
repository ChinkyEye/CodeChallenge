<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserHasVacation;
use Carbon\Carbon;
use Auth;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showResult($status)
    {
        $response = UserHasVacation::where('auther',Auth::user()->id)
                                ->where('status',$status)
                                ->where('is_active',true)
                                ->get(); 
        return response()->json($response);   

    }

    public function showDay()
    {
        $response = UserHasVacation::where('auther',Auth::user()->id)
                                    ->where('is_active',true)
                                    ->get(); 
        $arr_days = [];
        foreach($response as $a){
            $start_date = Carbon::parse($a->vacation_start_date);
            $end_date = Carbon::parse($a->vacation_end_date);
            $days = $start_date->diffInDays($end_date);
            $arr_days[] = $days;
        }
        $sum_days = 30 - array_sum($arr_days);
        return response()->json($sum_days);
    }



    public function index()
    {
        //
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
        $rules = array(
            "auther" => "required",
            "status" => "required|in:0,1,2",
            "request_created_at" => "required",
            "vacation_start_date" => "required",
            "vacation_end_date" => "required",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return $validator->errors();
        }
        else{
            $datas = UserHasVacation::where('auther',Auth::user()->id)
                                    ->where('is_active',true)
                                    ->get(); 
            $arr_days = [];
            foreach($datas as $a){
                $start_date = Carbon::parse($a->vacation_start_date);
                $end_date = Carbon::parse($a->vacation_end_date);
                $days = $start_date->diffInDays($end_date);
                $arr_days[] = $days;
            }
            $rem_days = 30 - array_sum($arr_days);
            if($rem_days > 0)
            {
                $userhasvacations = UserHasVacation::create([
                    'auther' => $request['auther'],
                    'status' => $request['status'],
                    'resolved_by' => Auth::user()->id,
                    'request_created_at' => $request['request_created_at'],
                    'vacation_start_date' => $request['vacation_start_date'],
                    'vacation_end_date' => $request['vacation_end_date'],
                ]);
                $pass = array(
                    'message' => 'Data added successfully!',
                );
            }
            else
            {
                $pass = array(
                    'message' => 'Vacation Limit of 30 days exceeded!',
                );   
            }

            return response()->json($pass);
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
        //
    }
}
