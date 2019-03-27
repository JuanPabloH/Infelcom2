<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Line_of_investigation;
use Session;

class LineInvestigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $line_of_investigations=Line_of_investigation::paginate(5);
        return view("lineaInvestigacion.index",compact('line_of_investigations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lineaInvestigacion.create');
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
            'name' => ['required', 'string', 'max:255','unique:line_of_investigations'],
                 
        );
        $messages = [
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $line=new Line_of_investigation;
        $line->name=$request->name;
        
        $line->save();
        return redirect('/grupo')->with('message','Registro exitoso');
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
        $line =Line_of_investigation::find($id);
        return view('lineaInvestigacion.edit',['line_of_investigation'=>$line]);
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
        $line = Line_of_investigation::find($id);


        if ($line->name == $request->name) {
            $rules = array(         
        );
        }
        else{
            $rules = array(
            'name' => ['required', 'string', 'max:255','unique:line_of_investigations']);
        }
        
        
        $messages = [       
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $line->name=$request->name;
        
        $line->save();
        Session::flash('message','Linea de investigacion Actualizada Correctamente');
        return redirect('/lineaInvestigacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Line_of_investigation::destroy($id);
        Session::flash('message','Linea de investigacion Eliminada Correctamente');
        return redirect('/lineaInvestigacion');
    }
}
