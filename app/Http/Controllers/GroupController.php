<?php

namespace App\Http\Controllers;
use App\Group;

use App\ResearchArea;
use App\ResearchCenter;
use App\School;
use App\Area_Group;
use App\Group_Line;
use App\Line_of_investigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=Group::paginate(5);        
        $areas=ResearchArea::all();
        $area_grupos= Area_Group::all(); 
        $lines=Line_of_investigation::all();
        $group_lines= Group_Line::all(); 
        return view('grupo.index',compact('groups'))->with(['areas'=>$areas])->with(['area_grupos'=>$area_grupos])->with(['lines'=>$lines])->with(['group_lines'=>$group_lines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
         $group =Group::find($id);
        $researchCenters=ResearchCenter::all();
        $schools=School::all();
        $prueba="prueba";
        return view('grupo.edit',['group'=>$group])
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
            'name' => ['required','string', 'max:255'],
            'id_school' => ['required'],     
            'creationDate' => ['required'],     
            'id_research_center' => ['required'], 
            'acronym' => ['required'],     
            'email' => ['required', 'string', 'email', 'max:255'],
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
            'acronym.required' => 'Por favor ingrese el acronimo del grupo',
            'email.required' => 'Por favor ingrese el email del grupo',
            'website.required' => 'Por favor ingrese el sitio web del grupo',
            'objective.required' => 'Por favor ingrese el objetivo del grupo',
            'mision.required' => 'Por favor ingrese la mision del grupo',
            'vision.required' => 'Por favor ingrese la vision del grupo',
            'workplan.required' => 'Por favor ingrese el plan de trabajo del grupo',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }
        $group=Group::find($id);
      
        
        $group->classification=$request->classification;
        $group->name=$request->name;
        $group->creationDate=$request->creationDate;
        $group->acronym=$request->acronym;
        $group->email=$request->email;
        $group->website=$request->website;
        $group->objective=$request->objective;
        $group->mision=$request->mision;
        $group->vision=$request->vision;
        $group->workplan=$request->workplan;
        $group->id_school=$request->id_school;
        $group->id_research_center=$request->id_research_center;
        $group->save();
        

        return redirect('/grupo')->with('message','Información de Infelcom actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
