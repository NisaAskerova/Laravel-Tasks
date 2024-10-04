<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
 public function create(){
    return view('tags.create');
 }
 public  function store(Request $request){
    $tag=new Tag();
    $tag->name=$request->name;
    $tag->save();
    return redirect()->route('tags.index'); 
}

public function index(){
    $tags = Tag::all(); 
    return view('tags.index', compact('tags'));
}
}
