<?php

namespace App\Http\Controllers;
use App\Notice;
use Illuminate\Http\Request;

class IndexNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
    
        $notices=Notice::name($request->get('name'))->paginate(10);
        
        return view('index.newIndex',compact('notices'));
    
    }

}
