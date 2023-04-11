<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Auth;
use DB;
use App\Events\AddressCreated;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myDay()
    {
        // return "some changes is made via this function";
    
    }

    public function __construct()
    {
        $this->middleware('role:writer', ['only' => ['create']]);
    }

    public function index()
    {
        $datas = DB::table('addresses')
                    ->where('is_active',true)
                    ->get();
        $data = Address::orderBy('id','DESC')
                        // ->where('is_active',true)
                        ->get();            
        // return view('staff.address.index', ['data' => $datas]);
        return view('staff.address.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $addresses= Address::create([
            'name' => $request['name'],
        ]);
        $pass = array(
            'message' => 'Data added successfully!',
            'alert-type' => 'success'
        );
        event(new AddressCreated($addresses));
        return redirect()->route('staff.address.index')->with($pass);

        // DB::table('addresses')->insert([
        //     'name' => $request->name,
        // ]);
        // return redirect()->route('staff.address.index');
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
        $datas = Address::find($id);
        return view('staff.address.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $main_data = $request->all();
        // $main_data['resolved_by'] = Auth::user()->id;
        $address->update($main_data);
        return redirect()->route('staff.address.index');

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

    public function isActive(Request $request,$id)
    {
        $get_is_active = Address::where('id',$id)
                        ->value('is_active');
        $isactive = Address::find($id);
        if($get_is_active == 0){
            $isactive->is_active = 1;
            $notification = array(
              'message' => $isactive->name.' is Active!',
              'alert-type' => 'success'
          );
        }
        else {
            $isactive->is_active = 0;
            $notification = array(
              'message' => $isactive->name.' is inactive!',
              'alert-type' => 'error'
          );
        }
        if(!($isactive->update())){
            $notification = array(
              'message' => 'data could not be changed!',
              'alert-type' => 'error'
          );
        }
        return back()->with($notification)->withInput();
    }
}
