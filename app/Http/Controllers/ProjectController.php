<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Line_of_investigation;
use Session;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects=Project::name($request->get('name'))->paginate(1);
        
        return view('proyecto.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lines=Line_of_investigation::all();
        return view('proyecto.create',['lines'=>$lines]);
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
            'code' => ['required','string', 'max:255','unique:projects'],
            'name' => ['required', 'string', 'max:255','unique:projects'],
            'status' => ['required', 'string'],
            'startDate' => ['required'],
            'objective' => ['required', 'string'],
            'duration' => ['required', 'integer'],           
            'sumary' => ['required', 'string'],
            'financing' => ['required', 'integer'],
            'valueProject' => ['required', 'integer'],
            'id_line' => ['required'],
        );
        $messages = [
            'code.required' => 'Por favor ingrese el campo del Codigo de la escuela',
            'code.unique' => 'El Codigo ingresado ya se encuentra registrado',        
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',
            'status.required'=>'Por favor ingrese el estado del proyecto',
            'objective.required'=>'Por favor ingrese el objetivo del proyecto',
            'duration.required'=>'Por favor ingrese la duración del proyecto'  ,
            'duration.integer'=>'La duracion del proyecto debe ser un numero, recuerde que es el numero de meses',                            
            'sumary.required'=>'Por favor ingrese el un resumen del proyecto',
            'financing.required'=>'Por favor infrese el financiamiento del proyecto',
            'financing.integer'=>'El valor ingresado en el campo de financiamiento no es valido, recuerde que debe ser un valor numerico',
            'valueProject.required'=>'Por favor infrese el valor del proyecto',
            'valueProject.integer'=>'El valor ingresado en el campo de valor del proyecto no es valido, recuerde que debe ser un valor numerico',
            'id_line.required'=>'Por favor verifique la existencia de lineas de investigación',
            'startDate.required'=>'Ingrese la fecha de inicio del proyecto',
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $project=new Project;
        $project->code=$request->code;
        $project->name=$request->name;
        $project->status=$request->status;
		$project->objective=$request->objective;
        $project->startDate=$request->startDate;
        $project->duration=$request->duration;
        $project->sumary=$request->sumary;
        $project->financing=$request->financing;
        $project->valueProject=$request->valueProject;
        $project->id_line=$request->id_line;              
        $project->save();
        return redirect('/proyecto')->with('message','El proyecto se ha registrado de forma exitosa');
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
        $peoject =Project::find($id);
        $lines=Line_of_investigation::all();
        return view('proyecto.edit',['project'=>$project],['lines'=>$lines]);
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
        $project=Project::find($id);

        if ($request->code==$faculty->code && $request->name==$faculty->name) {
            $rules = array(       
        );
        }
        elseif ($request->code==$faculty->code) {
            $rules = array(
            'name' => ['required', 'string', 'max:255','unique:faculties'],
            'status' => ['required', 'string'],
            'startDate' => ['required'],
            'objective' => ['required', 'string'],
            'duration' => ['required', 'integer'],           
            'sumary' => ['required', 'string'],
            'financing' => ['required', 'decimal'],
            'valueProject' => ['required', 'decimal'],
            'id_line' => ['required'],           
        );
        }
        elseif ($request->name==$faculty->name) {
            $rules = array(
            'code' => ['required','string', 'max:255','unique:faculties'],
            'status' => ['required', 'string'],
            'startDate' => ['required'],
            'objective' => ['required', 'string'],
            'duration' => ['required', 'integer'],           
            'sumary' => ['required', 'string'],
            'financing' => ['required', 'decimal'],
            'valueProject' => ['required', 'decimal'],
            'id_line' => ['required'],         
        );
        }
        else{
            $rules = array(
            'code' => ['required','string', 'max:255','unique:faculties'],
            'name' => ['required', 'string', 'max:255','unique:faculties'],
            'status' => ['required', 'string'],
            'startDate' => ['required'],
            'objective' => ['required', 'string'],
            'duration' => ['required', 'integer'],           
            'sumary' => ['required', 'string'],
            'financing' => ['required', 'decimal'],
            'valueProject' => ['required', 'decimal'],
            'id_line' => ['required'],          
        );
        }

        $messages = [
            'code.required' => 'Por favor ingrese el campo del Codigo de la escuela',
            'code.unique' => 'El Codigo ingresado ya se encuentra registrado',        
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',    
            'status.required'=>'Por favor ingrese el estado del proyecto',
            'objective.required'=>'Por favor ingrese el objetivo del proyecto',
            'duration.required'=>'Por favor ingrese la duración del proyecto'  ,                             
            'sumary.required'=>'Por favor ingrese el un resumen del proyecto',
            'financing.required'=>'Por favor infrese el financiamiento del proyecto',
            'valueProject.required'=>'Por favor infrese el valor del proyecto',
            'id_line.required'=>'Por favor verifique la existencia de lineas de investigación',
            'startDate.required'=>'Ingrese la fecha de inicio del proyecto'    ,                       
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $project->code=$request->code;
        $project->name=$request->name;
        $project->status=$request->status;
		$project->objective=$request->objective;
        $project->startDate=$request->startDate;
        $project->duration=$request->duration;
        $project->sumary=$request->sumary;
        $project->financing=$request->financing;
        $project->valueProject=$request->valueProject;
        $project->id_line=$request->id_line;              
        $project->save();
        
        $project->save();
        Session::flash('message','Información de proyecto actualizada correctamente');
        return redirect('/proyecto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        Session::flash('message','proyecto eliminado Correctamente');
        return redirect('/proyecto');
    }
}
