<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Role_user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class UsersController extends Controller
{
    public function index()
    {
    	$users=User::paginate(5);
    	
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
        $data=$request->all();
        $rules = array(
            'document' => ['required','string', 'max:255','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'photo' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6']
        );
        $messages = [
            'document.required' => 'Por favor ingrese el campo del documento',
            'document.unique' => 'El documento ingresado ya se encuentra registrado',
            'document.integer' => 'El documento del usuario debe ser numerico, por favor verifique el campo',
            'name.required' => 'Por favor ingrese el campo del nombre',
            'last_name.required' => 'Por favor ingrese el campo del apellido',
            'email.required' => 'Por favor ingrese el campo del email',
            'email.unique' => 'El email que intenta ingresar ya se encuentra registrado',
            'password.required' => 'Por favor ingrese el campo de la contraseña',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
    	$user=new User;
        $hasfile= $request->hasfile('photo') && $request->photo->isValid();
        if ($hasfile) {
            $extension=$request->photo->extension();
            $user->photo="$request->document.$extension";
        }
    	
    	$user->document=$request->document;
    	$user->name=$request->name;
    	$user->last_name=$request->last_name;
    	$user->cv=$request->cv;
    	$user->email=$request->email;
    	$user->password=Hash::make($request->password);
    	$user->save();
    	$user
        ->roles()
        ->attach(Role::where('name', 'user')->first());
        if ($hasfile) {
            $request->photo->storeAs('images',"$request->document.$extension");
        }

        return redirect('/usuario')->with('message','Usuario registrado con exito');
      

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
        $data=$request->all();
        if ($request->document==$user->document && $request->email==$user->email) {
            $rules = array(
            'document' => ['required','string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'photo' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        );  
        }
        elseif ($request->document==$user->document) {
            $rules = array(
            'document' => ['required','string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'photo' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ); 
        }
        elseif ($request->email==$user->email) {
            $rules = array(
            'document' => ['required','string', 'max:255','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'photo' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        );
        }
        else{
            $rules = array(
            'document' => ['required','string', 'max:255','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'photo' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        );
        }
        

        $messages = [
            'document.required' => 'Por favor ingrese el campo del documento',
            'document.unique' => 'El documento ingresado ya se encuentra registrado',
            'document.integer' => 'El documento del usuario debe ser numerico, por favor verifique el campo',
            'name.required' => 'Por favor ingrese el campo del nombre',
            'last_name.required' => 'Por favor ingrese el campo del apellido',
            'email.required' => 'Por favor ingrese el campo del email',
            'email.unique' => 'El email que intenta ingresar ya se encuentra registrado',
            'password.required' => 'Por favor ingrese el campo de la contraseña',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }



    	
        $hasfile= $request->hasfile('photo') && $request->photo->isValid();
        if ($hasfile) {
            $extension=$request->photo->extension();
            $user->photo="$request->document.$extension";
        }
        else{
            $user->photo=$user->photo;
        }
        $user->document=$request->document;
    	$user->name=$request->name;
    	$user->last_name=$request->last_name;
    	$user->cv=$request->cv;
    	$user->email=$request->email;
        if (!$request->password=='') {
            $user->password=Hash::make($request->password);
        }
        else{
            $user->password=$user->password;
        }
    	
        $user->save();
        if ($hasfile) {
            $request->photo->storeAs('images',"$request->document.$extension");
        }
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
