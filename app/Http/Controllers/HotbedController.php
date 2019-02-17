<?php

namespace App\Http\Controllers;
use App\Hotbed;

use App\ResearchCenter;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class HotbedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotbeds=Hotbed::paginate(5);
        
        return view('semillero.index',compact('hotbeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchCenters=ResearchCenter::all();
        $schools=School::all();
        return view('semillero.create',['schools'=>$schools],['centros'=>$researchCenters]);
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
            'name' => ['required','string', 'max:255','unique:hotbeds'],
            'name' => ['required', 'string', 'max:255'],
            'id_school' => ['required'],     
            'creationDate' => ['required'],     
            'id_research_center' => ['required'], 
            'acronym' => ['required'],     
            'email' => ['required', 'string', 'email', 'max:255', 'unique:hotbeds'],
            'website' => ['required'],  
            'objective' => ['required'],  
            'mision' => ['required'],  
            'vision' => ['required'], 
            'workplan' => ['required'],  
        );
        $messages = [
            'id_school'=>'Verifique la existencia de Escuelas para asignar el grupo',
            'id_research_center'=>'Verifique la existencia de centros de investigación para asignar el grupo',
            'name.required' => 'Por favor ingrese en nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',
            'creationDate.required' => 'Ingrese una fecha de creacion valida',
            'acronym.required' => 'Por favor ingrese el acronimo del semillero',
            'email.required' => 'Por favor ingrese el email del semillero',
            'website.required' => 'Por favor ingrese el sitio web del semillero',
            'objective.required' => 'Por favor ingrese el objetivo del semillero',
            'mision.required' => 'Por favor ingrese la mision del semillero',
            'vision.required' => 'Por favor ingrese la vision del semillero',
            'workplan.required' => 'Por favor ingrese el plan de trabajo del semillero',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }
        $hotbed=new Hotbed;
      
        
        $hotbed->classification=$request->classification;
        $hotbed->name=$request->name;
        $hotbed->creationDate=$request->creationDate;
        $hotbed->acronym=$request->acronym;
        $hotbed->email=$request->email;
        $hotbed->website=$request->website;
        $hotbed->objective=$request->objective;
        $hotbed->mision=$request->mision;
        $hotbed->vision=$request->vision;
        $hotbed->workplan=$request->workplan;
        $hotbed->id_school=$request->id_school;
        $hotbed->id_research_center=$request->id_research_center;
        $hotbed->save();
        

        return redirect('/semillero')->with('message','semillero registrado con exito');
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
         $hotbed =Hotbed::find($id);
        $researchCenters=ResearchCenter::all();
        $schools=School::all();
        $prueba="prueba";
        return view('semillero.edit',['hotbed'=>$hotbed])
        ->with('centros',$researchCenters)->with('schools',$schools);
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
            'name' => ['required','string', 'max:255','unique:hotbeds'],
            'id_school' => ['required'],     
            'creationDate' => ['required'],     
            'id_research_center' => ['required'], 
            'acronym' => ['required'],     
            'email' => ['required', 'string', 'email', 'max:255', 'unique:hotbeds'],
            'website' => ['required'],  
            'objective' => ['required'],  
            'mision' => ['required'],  
            'vision' => ['required'], 
            'workplan' => ['required'],  
        );
        $messages = [
            'id_school'=>'Verifique la existencia de Escuelas para asignar el grupo',
            'id_research_center'=>'Verifique la existencia de centros de investigación para asignar el grupo',
            'name.required' => 'Por favor ingrese en nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',
            'creationDate.required' => 'Ingrese una fecha de creacion valida',
            'acronym.required' => 'Por favor ingrese el acronimo del semillero',
            'email.required' => 'Por favor ingrese el email del semillero',
            'website.required' => 'Por favor ingrese el sitio web del semillero',
            'objective.required' => 'Por favor ingrese el objetivo del semillero',
            'mision.required' => 'Por favor ingrese la mision del semillero',
            'vision.required' => 'Por favor ingrese la vision del semillero',
            'workplan.required' => 'Por favor ingrese el plan de trabajo del semillero',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }
        $hotbed=Hotbed::find($id);
      
        
        $hotbed->classification=$request->classification;
        $hotbed->name=$request->name;
        $hotbed->creationDate=$request->creationDate;
        $hotbed->acronym=$request->acronym;
        $hotbed->email=$request->email;
        $hotbed->website=$request->website;
        $hotbed->objective=$request->objective;
        $hotbed->mision=$request->mision;
        $hotbed->vision=$request->vision;
        $hotbed->workplan=$request->workplan;
        $hotbed->id_school=$request->id_school;
        $hotbed->id_research_center=$request->id_research_center;
        $hotbed->save();
        

        return redirect('/semillero')->with('message','Información de semillero actualizada con exito');
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
        Session::flash('message','Semillero Eliminado Correctamente');
        return redirect('/semillero');
    }
}
