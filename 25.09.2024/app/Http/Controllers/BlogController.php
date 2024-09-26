<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(){
        $categories=Category::all();
        return view('blogs.create', compact('categories'));
    }
    public function index(){
        $blogs=Blog::paginate(3);
        /*$blogs=Blog::select('blogs.id', 'blogs.title', 'blogs.content', 'categories.name as category_name')
        ->leftJoin('categories','categories.id','=','blogs.category_id')
        ->paginate(3);*/
        #1-1
        $blogs=Blog::with('category')->paginate(3);
        // return $blogs;
        return view('blogs.index', compact('blogs'));
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ]);
        $blog=new Blog();
        $blog->title=$request->title;
        $blog->content=$request->content;
        $blog->category_id=$request->category_id;
        $blog->save();
        return redirect()->route(route: 'blogs.index');
    }
    public function edit($id){
        $blog=Blog::findOrFail($id);
        $categories=Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }
    public function update(Request  $request, $id){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ]);
        $blog=Blog::findOrFail($id);
        $blog->title=$request->title;
        $blog->content=$request->content;
        $blog->category_id=$request->category_id;
        $blog->save();
        return redirect()->route('blogs.index');
    }
    public function delete($id){
        $blog=Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route(route: 'blogs.index');

    }
}
