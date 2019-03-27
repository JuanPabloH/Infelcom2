<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use App\User_Hotbed;
use App\User;
use App\Hotbed;
class UserHotbedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (trim($request->name) != "") {           
           $hotbeds=Hotbed::where("name","LIKE","%$request->name%")->paginate(3);      
        }
        else{
            $hotbeds=Hotbed::paginate(3);      
        }
        $user_semilleros= User_Hotbed::all(); 
        
        return view('userSemillero.index',compact('user_semilleros'),compact('hotbeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotbeds=Hotbed::all();
        $users=User::all();
        return view('userSemillero.create',['hotbeds'=>$hotbeds],['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $rules = array(            
            'id_user' => ['required'],            
            'id_hotbed' => ['required'],            
        );
        $messages = [                                        
            'id_user.required' => 'Por favor verifique la existencia de investigadores',
            'id_hotbed.required' => 'Por favor verifique la existencia de Semilleros',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }
        $user_Hotbed=new User_Hotbed;
        $user_Hotbed->id_user=$request->id_user;
        $user_Hotbed->id_hotbed=$request->id_hotbed;
        $user_Hotbed->save();
        return redirect('/userSemillero')->with('message','El registro fue exitoso');
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
        User_Hotbed::destroy($id);
        Session::flash('message','Usuario eliminado del grupo correctamente');
        return redirect('/userSemillero');
    }
}
