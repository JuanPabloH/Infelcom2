<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties=Faculty::paginate(5);
        
        return view('facultad.index',compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facultad.create');
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
            'code' => ['required','string', 'max:255','unique:faculties'],
            'name' => ['required', 'string', 'max:255','unique:faculties'],           
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
        $faculties=new Faculty;
        $faculties->code=$request->code;
        $faculties->name=$request->name;
        
        $faculties->save();
        return redirect('/facultad')->with('message','La facultad se ha registrado de forma exitosa');
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
        $faculty =Faculty::find($id);
        return view('facultad.edit',['faculty'=>$faculty]);
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
        $faculty=Faculty::find($id);

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
        $faculty->code=$request->code;
        $faculty->name=$request->name;
        
        $faculty->save();
        Session::flash('message','Información de facultad actualizada correctamente');
        return redirect('/facultad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::destroy($id);
        Session::flash('message','Facultad Eliminada Correctamente');
        return redirect('/facultad');
    }
}
