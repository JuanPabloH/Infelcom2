<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Hotbed_Line;
use App\Line_of_investigation;
use App\Hotbed;

class Hotbed_LineController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semillero_lineas= Hotbed_Line::all(); 
        $lineas=Line_of_investigation::paginate(3);      
        return view('semilleroLinea.index',compact('semillero_lineas'),compact('lineas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotbeds=Hotbed::all();
        $lines=Line_of_investigation::all();
        return view('semilleroLinea.create',['hotbeds'=>$hotbeds],['lineas'=>$lines]);
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
            'id_hotbed' => ['required'],            
        );
        $messages = [                                        
            'id_line.required' => 'Por favor verifique la existencia de Lineas de Investigacion',
            'id_hotbed.required' => 'Por favor verifique la existencia de Semilleros',

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }
        $area_hotbed=new Hotbed_Line;
        $area_hotbed->id_line=$request->id_line;
        $area_hotbed->id_hotbed=$request->id_hotbed;
        $area_hotbed->save();
        return redirect('/semilleroLinea')->with('message','El registro fue exitoso');
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
        Hotbed_Line::destroy($id);
        Session::flash('message','Relación Eliminada Correctamente');
        return redirect('/semilleroLinea');
    }
}
