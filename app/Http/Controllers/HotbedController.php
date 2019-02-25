<?php

namespace App\Http\Controllers;

use App\Hotbed;
use App\Line_of_investigation;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class HotbedController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hotbeds=Hotbed::name($request->get('name'))->paginate(1);
        
        return view('semillero.index',compact('hotbeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lines=Line_of_investigation::all();
        return view('semillero.create',['lines'=>$lines]);
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
            'code' => ['required','string', 'max:255','unique:hotbeds'],
            'name' => ['required', 'string', 'max:255','unique:hotbeds'],           
        );
        $messages = [
            'code.required' => 'Por favor ingrese el campo del Codigo de la escuela',
            'code.unique' => 'El Codigo ingresado ya se encuentra registrado',        
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $hotbed=new Hotbed;
        $hotbed->code=$request->code;
        $hotbed->name=$request->name;
        $hotbed->status=$request->status;
		$hotbed->objective=$request->objective;
        $hotbed->id_group=1;  
        $hotbed->id_line=$request->id_line;              
        $hotbed->save();
        return redirect('/semillero')->with('message','El semillero se ha registrado de forma exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotbed =Hotbed::find($id);
        $lines=Line_of_investigation::all();
        return view('semillero.edit',['hotbed'=>$hotbed],['lines'=>$lines]);
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
        $data=$request->all();
        $hotbed=Hotbed::find($id);

        if ($request->code==$faculty->code && $request->name==$faculty->name) {
            $rules = array(       
        );
        }
        elseif ($request->code==$faculty->code) {
            $rules = array(
            'name' => ['required', 'string', 'max:255','unique:faculties'],           
        );
        }
        elseif ($request->name==$faculty->name) {
            $rules = array(
            'code' => ['required','string', 'max:255','unique:faculties'],           
        );
        }
        else{
            $rules = array(
            'code' => ['required','string', 'max:255','unique:faculties'],
            'name' => ['required', 'string', 'max:255','unique:faculties'],           
        );
        }

        $messages = [
            'code.required' => 'Por favor ingrese el campo del Codigo de la escuela',
            'code.unique' => 'El Codigo ingresado ya se encuentra registrado',        
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $hotbed->code=$request->code;
        $hotbed->name=$request->name;
        $hotbed->status=$request->status;
		$hotbed->objective=$request->objective;
        $hotbed->id_line=$request->id_line;    
        
        $hotbed->save();
        Session::flash('message','Información de semillero actualizada correctamente');
        return redirect('/semillero');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hotbed::destroy($id);
        Session::flash('message','Semillero eliminado Correctamente');
        return redirect('/semillero');
    }
}
