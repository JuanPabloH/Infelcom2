<?php

namespace App\Http\Controllers;
use App\Faculty;
use App\School;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
class SchoolController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $schools= School::paginate(5);
        $faculties=Faculty::all();        
        return view('escuela.index',compact('schools'),['faculties'=>$faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$faculties=Faculty::all();
    	return view('escuela.create',['faculties'=>$faculties]);
        
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
            'code' => ['required','string', 'max:255','unique:schools'],
            'name' => ['required', 'string', 'max:255','unique:schools'],
            'id_faculty' => ['required'],            
        );
        $messages = [
            'code.required' => 'Por favor ingrese el campo del Codigo de la escuela',
            'code.unique' => 'El Codigo ingresado ya se encuentra registrado',        
            'name.required' => 'Por favor ingrese el campo del nombre',
			'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
			'id_faculty.required' => 'Por favor verifique la existencia de Facultades',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $school=new School;
        $school->code=$request->code;
        $school->name=$request->name;
        $school->id_faculty=$request->id_faculty;
        $school->save();
        return redirect('/escuela')->with('message','La escuela se ha registrado de forma exitosa');
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
        $school =School::find($id);
        $faculties=Faculty::all();
        return view('escuela.edit',['school'=>$school],['faculties'=>$faculties]);
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
        $rules = array(
            'code' => ['required','string', 'max:255','unique:schools'],
            'name' => ['required', 'string', 'max:255','unique:schools'],
            'id_faculty' => ['required'],            
        );
        $messages = [
            'code.required' => 'Por favor ingrese el campo del Codigo de la escuela',
            'code.unique' => 'El Codigo ingresado ya se encuentra registrado',        
            'name.required' => 'Por favor ingrese el campo del nombre',
			'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
			'id_faculty.required' => 'Por favor verifique la existencia de Facultades',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
    	$school = School::find($id);
        $school->code=$request->code;
        $school->name=$request->name;
        $school->id_faculty=$request->id_faculty;
        $school->save();
        Session::flash('message','Información de escuela actualizada correctamente');
        return redirect('/escuela');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        School::destroy($id);
        Session::flash('message','Escuela Eliminada Correctamente');
        return redirect('/escuela');
    }
}
