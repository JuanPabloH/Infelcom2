<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Role_user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;

class UsersController extends Controller
{

    public function index()
    {
    	$users=User::paginate(10);
    	
        return view('usuario.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('usuario.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	
    	$user=new User;
    	$user->document=$request->document;
    	$user->name=$request->name;
    	$user->last_name=$request->last_name;
    	$user->cv=$request->cv;
    	$user->photo=$request->photo;
    	$user->email=$request->email;
    	$user->password=Hash::make($request->password);
    	$user->save();
    	$user
        ->roles()
        ->attach(Role::where('name', 'user')->first());

        return redirect('/usuario')->with('message','store');
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view('usuario.show',['user'=>$user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    	$user =User::find($id);
        return view('usuario.edit',['user'=>$user]);

        
      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
   public function update(Request $request, $id)
    {
    	$user = User::find($id);
       // $user->fill($request->all());
        $user->document=$request->document;
    	$user->name=$request->name;
    	$user->last_name=$request->last_name;
    	$user->cv=$request->cv;
    	$user->photo=$request->photo;
    	$user->email=$request->email;
    	$user->password=Hash::make($user->password);
        $user->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return redirect('/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
   public function destroy($id)
    {
      	//$role_user=Role_user::where('user_id','=',$id)->get(); 
      	//Role_user::destroy($role_user);
     	User::destroy($id);
       /// $user= User::find($id);
        //$user
        //->roles()
        //->detach(Role_user::where('user_id', $id)
        Session::flash('message','Usuario Eliminado Correctamente');
        return redirect('/usuario');
    }

    //
}
