<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Group_Line;
use App\Line_of_investigation;
use App\Group;

class Group_LineController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupo_lineas= Group_Line::all(); 
        $lineas=Line_of_investigation::paginate(3);      
        return view('grupoLinea.index',compact('grupo_lineas'),compact('lineas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=Group::all();
        $lines=Line_of_investigation::all();
        return view('grupoLinea.create',['groups'=>$groups],['lineas'=>$lines]);
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
            'id_line' => ['required'],            
            'id_group' => ['required'],            
        );
        $messages = [                                        
            'id_line.required' => 'Por favor verifique la existencia de Lineas de Investigacion',
            'id_group.required' => 'Por favor verifique la existencia de Semilleros',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }
        $area_group=new Group_Line;
        $area_group->id_line=$request->id_line;
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
        Group_Line::destroy($id);
        Session::flash('message','Relación Eliminada Correctamente');
        return redirect('/grupo');
    }
}
