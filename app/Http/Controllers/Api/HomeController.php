<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function token()
    {
        return csrf_token(); 
    }

    public function index(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $users = User::where('is_active',true)
                     ->where('email',$request->email)
                     ->first();
        if($users){
        $token = $users->createToken('my-api-token')->plainTextToken;
        }             
        if(Auth::attempt(['email'=>$email,'password'=>$password], true)){ 
            return response()->json(['success'=>true,'message'=>'Successfully logged in',"newx"=>true,'user_type'=>Auth::user()->user_type,'user'=>Auth::user(),'token' => $token]);
        }
        else{
           return response()->json(['success'=>false,'message'=>'Invalid username or password']);
        
        }
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
