<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
class IndexTeacherController extends Controller
{
    public function index(Request $request)
    {
        $users=User::name($request->get('name'))->paginate(10);
        
        return view('index.teacherIndex',compact('users'));
    }
}
