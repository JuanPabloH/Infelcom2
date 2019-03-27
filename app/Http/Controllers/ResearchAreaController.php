<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResearchArea;
use Illuminate\Support\Facades\Validator;
use Session;


class ResearchAreaController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchAreas= ResearchArea::paginate(5);
            
        return view('areaInvestigacion.index',compact('researchAreas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('areaInvestigacion.create');
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
            'name' => ['required', 'string', 'max:255','unique:research_areas'],           
        );
        $messages = [    
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
        $researchArea=new ResearchArea;
        $researchArea->name=$request->name;
        
        $researchArea->save();
        return redirect('/areaInvestigacion')->with('message','El area de investigacion se ha registrado de forma exitosa');
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
        $researchArea =ResearchArea::find($id);
        return view('areaInvestigacion.edit',['researchArea'=>$researchArea]);
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
        $researchArea = ResearchArea::find($id);

        if ($researchArea->name == $request->name) {
            $rules = array(         
        );
        }
        else{
            $rules = array(
            'name' => ['required', 'string', 'max:255','unique:research_areas']);
        }
        
        
        $messages = [       
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        
        $researchArea->name=$request->name;
        
        $researchArea->save();
        Session::flash('message','Información de area de investigacion actualizada correctamente');
        return redirect('/areaInvestigacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ResearchArea::destroy($id);
        Session::flash('message','Area de investigacion Eliminado Correctamente');
        return redirect('/areaInvestigacion');
    }
}
