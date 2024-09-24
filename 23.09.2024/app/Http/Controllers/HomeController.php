<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 public function hello(){
    $names=[
        'Nise', 'Meley', 'Asya', 'Banu'
    ];
    $age=26;
    $boll=true;
    // return view('hello-world',[
    //     'names'=>$names,
    //     'age'=>$age,
    //     'boll'=>$boll
    // ]);
    return view('hello-world', compact('names', 'age', 'boll'));
 }
}
