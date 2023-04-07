<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Mail;


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

    public function register(Request $request)
    {
        // dd($request);
        $validators = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            // 'c_password' => 'required|same:password'
        ]);

        if($validators->fails())
        {
            $response = [
                'success' => false,
                'message' => $validators->errors()
            ];
            return response()->json($response, 400);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        $response = [
            'success' => true,
            'message' => "data is succesfully register",
            'data' => $success
        ];
        return response()->json($response);
    }

    public function logout(Request $request)
    {
        try
        {
            Auth::user()->currentAccessToken()->delete();
            // $request->user()->currentAccessToken()->delete();
            // auth()->logout();
            return response()->json(['success' => true,'message' =>'User log out']);

        }catch(\Exception $e)
        {

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function sendVerifyMail($email)
    {
        if(Auth::user())
        {
            $user = User::where('email',$email)->get();
            if(count($user) > 0)
            {
                $random = Str::random(50);
                $domain = URL::to('/');
                $url = $domain.'/verifyemail/'.$random;

                $data['url'] = $url;
                $data['email'] = $email;
                $data['title'] = "Email Verification";
                $data['body'] = "Plese click below to verify the email";
                Mail::send('verifyemail',['data' => $data], function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });
                
                $user = User::find($user[0]['id']);
                $user->remember_token = $random;
                $user->save();
                return response()->json(['success' => true , 'message' => 'mail is sent']);


            }else{
                return response()->json(['success' => false, 'message' => 'user is not found']);
            }

        }
        else
        {
            return response()->json(['success' => false, 'message' => 'user is not authenticated']);
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
