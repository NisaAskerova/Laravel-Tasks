<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    
    public function index(Request $request){
        return view('form.index');
    }
    public function submit(Request $request){
        $request->validate([
            'name'=>['required', 'string', 'min:3', 'max:30'],
            'surname'=>['required', 'string', 'min:3', 'max:30'],
            'email'=>['required', 'email'],
            'age'=>['required', 'int', 'min:16', 'max:130'],
            'gender'=>['required'],
        ]);
        $data=[
            'name'=>$request->name,
            'surname'=>$request->surname,
            'email'=>$request->email,
            'age'=>$request->age,
            'gender'=>$request->gender
        ];
        return view('form.index', compact('data'));
    }
}
