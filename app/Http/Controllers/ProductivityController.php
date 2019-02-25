<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productivity;
use App\Project;
use Session;
use Illuminate\Support\Facades\Validator;
class ProductivityController extends Controller
{
     public function index(Request $request)
    {

    	$productivities=Productivity::name($request->get('description'))->paginate(5);
    	$projects=Project::all();
        return view('productividad.index',compact('productivities'),['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $projects=Project::all();
        return view('productividad.create',['projects'=>$projects]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $rules = array(
            'file' => ['required'], 
            'description' => ['required'], 
            'id_project' => ['required'],                       
        );
        $messages = [
            'file.required' => 'Por favor seleccione el archivo',         
            'description.required' => 'Por favor ingrese una descripción',         
            'id_project.required' => 'verifique la existencia de proyectos para asignar productividad',            

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
    	$productividad=new Productivity;
        $hasfile= $request->hasfile('file') && $request->file->isValid();
        if ($hasfile) {            
        	$extension=$request->file->extension();
        	$productividad->file=$extension;                     
        }
    	
    	$productividad->description=$request->description;
    	$productividad->id_project=$request->id_project;
        $productividad->save();
    	
    	if ($hasfile) {
           $request->file->storeAs('productividadFiles',"$productividad->id.$extension");
       	}
    
    	     

        return redirect('/productividad')->with('message','Productividad registrada con exito');
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $productivity =Productivity::find($id);
        $projects=Project::all();
        return view('productividad.edit',['productivity'=>$productivity],['projects'=>$projects]); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
   public function update(Request $request, $id)
    {           
    	$data=$request->all();
        $rules = array(
            'description' => ['required'], 
            'id_project' => ['required'],                       
        );
        $messages = [
            'description.required' => 'Por favor ingrese una descripción',         
            'id_project.required' => 'verifique la existencia de proyectos para asignar productividad',            

        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
    	$productividad=Productivity::find($id);
        $hasfile= $request->hasfile('file') && $request->file->isValid();
        if ($hasfile) {            
        	$extension=$request->file->extension();
        	$productividad->file=$extension;                     
        }
        else{
        	$productividad->file=$productividad->file;
        }
    	
    	$productividad->description=$request->description;
    	$productividad->id_project=$request->id_project;
        $productividad->save();
    	
    	if ($hasfile) {
           $request->file->storeAs('productividadFiles',"$productividad->id.$extension");
       	}
    
    	     

        return redirect('/productividad')->with('message','Productividad registrada con exito');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
   public function destroy($id)
    {
      	Productivity::destroy($id);
        Session::flash('message','Productividad eliminada Correctamente');
        return redirect('/productividad');
    }
}
