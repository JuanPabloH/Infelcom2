<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Area_Hotbed;
use App\ResearchArea;
use App\Hotbed;

class Area_HotbedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area_semilleros= Area_Hotbed::all(); 
        $areas=ResearchArea::paginate(3);      
        return view('areaSemillero.index',compact('area_semilleros'),compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotbeds=Hotbed::all();
        $areas=ResearchArea::all();
        return view('areaSemillero.create',['hotbeds'=>$hotbeds],['areas'=>$areas]);
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
            'id_hotbed' => ['required'],            
        );
        $messages = [                                        
            'id_area.required' => 'Por favor verifique la existencia de Áreas de Investigacion',
            'id_hotbed.required' => 'Por favor verifique la existencia de Semilleros',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }
        $area_hotbed=new Area_Hotbed;
        $area_hotbed->id_area=$request->id_area;
        $area_hotbed->id_hotbed=$request->id_hotbed;
        $area_hotbed->save();
        return redirect('/areaSemillero')->with('message','El registro fue exitoso');
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
        Area_Hotbed::destroy($id);
        Session::flash('message','Relación Eliminada Correctamente');
        return redirect('/areaSemillero');
    }
}
