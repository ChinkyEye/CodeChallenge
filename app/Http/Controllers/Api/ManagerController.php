<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserHasVacation;
use Auth;
use Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllData($status)
    {
        if(Auth::user()->user_type == 1){
            $response = UserHasVacation::where('status',$status)
                                        ->where('is_active',true)
                                        ->get(); 
            return response()->json($response);
        }
        else
        {
            return ['message' => 'Unauthorized person'];
        }
    }

    public function getIndividual($id)
    {
        if(Auth::user()->user_type == 1){
            $response = UserHasVacation::where('auther',$id)->get();
            return response()->json($response);
        }
        else
        {
            return ['message' => 'Unauthorized person'];
        }
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
        //
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
    public function update(Request $request)
    {
        $rules = array(
            "id" => "required",
            "status" => "required|in:0,1,2",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return $validator->errors();
        }
        else{
            if(Auth::user()->user_type == 1){
                $data= UserHasVacation::findorFail($request->id);
                $data->status = $request->status;
                $data->updated_by = Auth::user()->id;
                if($data->update())
                {
                    return ["message" => "Has been successfully updated"];

                }else
                {
                    return ["message" => "operation has been failed"];
                }
            }
            else
            {
                return ['message' => 'Unauthorized person'];
            }
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
        //
    }
}
