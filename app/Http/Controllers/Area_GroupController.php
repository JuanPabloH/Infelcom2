<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Area_Group;
use App\ResearchArea;
use App\Group;

class Area_GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area_semilleros= Area_Group::all(); 
        $areas=ResearchArea::paginate(3);      
        return view('areaGrupo.index',compact('area_semilleros'),compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=Group::all();
        $areas=ResearchArea::all();
        return view('areaGrupo.create',['groups'=>$groups],['areas'=>$areas]);
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
            'id_area' => ['required'],            
            'id_group' => ['required'],            
        );
        $messages = [                                        
            'id_area.required' => 'Por favor verifique la existencia de Áreas de Investigacion',
            'id_group.required' => 'Por favor verifique la existencia de Semilleros',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }
        $area_group=new Area_Group;
        $area_group->id_area=$request->id_area;
        $area_group->id_group=$request->id_group;
        $area_group->save();
        return redirect('/grupo')->with('message','El registro fue exitoso');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area_Group::destroy($id);
        Session::flash('message','Relación Eliminada Correctamente');
        return redirect('/grupo');
    }
}
