<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        Notification::send($user, new WelcomeNotification);
        // $user->notify(new WelcomeNotification);
        // checking
        return view('home');
    }

    public function verifytoken($token)
    {
        $user = User::where('remember_token',$token)->get();
        if(count($user) > 0)
        {
            $user = User::find($user[0]['id']);
            $user->remember_token = null;
            $user->is_verified = 1;
            $user->email_verified_at = Carbon::now()->format('Y-m-d');
            $user->save();
            return  "Enail Verified";

        }
        else{
            return response()->json("eroro");
        }
    }
}
