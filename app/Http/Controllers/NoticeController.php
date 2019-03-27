<?php

namespace App\Http\Controllers;

use App\Notice;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $notices=Notice::name($request->get('name'))->paginate(5);
        //$users=User::name($request->get('name'))->paginate(5);
        
        return view('noticia.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticia.create');
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
            'name' => ['required', 'string', 'max:255','unique:notices'],
            'description' => ['required'],
                 
        );
        $messages = [
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado', 
            'description.required' => 'Por favor ingrese la descripción de la noticia'                              
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $notice=new Notice;
        $hasfile= $request->hasfile('photo') && $request->photo->isValid();
        if ($hasfile) {
            $extension=$request->photo->extension();
            $notice->photo=$extension; 
        }
        $notice->name=$request->name;
        $notice->description=$request->description;
        $notice->noticeDate=$request->noticeDate;
        $notice->save();

        if ($hasfile) {
           $request->photo->storeAs('noticiaImages',"$notice->id.$extension");
        }
    
        return redirect('/noticia')->with('message','Registro exitoso');
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
        $notice =Notice::find($id);
        return view('noticia.edit',['notice'=>$notice]);
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
        $notice = Notice::find($id);

        if ($notice->name == $request->name) {
            $rules = array(         
        );
        }
        else{
            $rules = array(
            'name' => ['required', 'string', 'max:255','unique:notices'],
            'description' => ['required'],
            );
        }
        
        
        $messages = [       
            'name.required' => 'Por favor ingrese el campo del nombre',
            'name.unique' => 'El nombre ingresado ya se encuentra registrado',                               
            'description.required' => 'Por favor ingrese la descripción de la noticia'
        ];
        $v=Validator::make($data,$rules,$messages);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->except('password'));
        }
        $hasfile= $request->hasfile('photo') && $request->photo->isValid();
        if ($hasfile) {
            $extension=$request->photo->extension();
            $notice->photo=$extension; 
        }
        $notice->name=$request->name;
        $notice->description=$request->description;  
        $notice->noticeDate=$request->noticeDate;  
        $notice->save();
        Session::flash('message','Información de noticia actualizada correctamente');
        if ($hasfile) {
           $request->photo->storeAs('noticiaImages',"$notice->id.$extension");
        }
        return redirect('/noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notice::destroy($id);
        Session::flash('message','noticia eliminada Correctamente');
        return redirect('/noticia');
    }
}
