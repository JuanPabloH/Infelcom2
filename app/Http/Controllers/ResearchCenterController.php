<?php

namespace App\Http\Controllers;
use App\ResearchCenter;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ResearchCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchCenters= ResearchCenter::paginate(5);
            
        return view('centroInvestigacion.index',compact('researchCenters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('centroInvestigacion.create');
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
            'name' => ['required', 'string', 'max:255','unique:research_centers'],           
        );
        $messages = [    
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
        $researchCenter=new ResearchCenter;
        $researchCenter->name=$request->name;
        
        $researchCenter->save();
        return redirect('/centroInvestigacion')->with('message','El centro de investigacion se ha registrado de forma exitosa');
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
        $researchCenter =ResearchCenter::find($id);
        return view('centroInvestigacion.edit',['researchCenter'=>$researchCenter]);
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
            'name' => ['required', 'string', 'max:255','unique:research_centers'],           
        );
        $messages = [       
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $researchCenter = ResearchCenter::find($id);
        $researchCenter->name=$request->name;
        
        $researchCenter->save();
        Session::flash('message','Información de Centro de investigacion actualizada correctamente');
        return redirect('/centroInvestigacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ResearchCenter::destroy($id);
        Session::flash('message','Centro de investigacion Eliminado Correctamente');
        return redirect('/centroInvestigacion');
    }
}
