<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Blog::create([
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('blogs.blog')->with('success', 'Blog successfully created!');
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function index()
    {
        $blogs = Blog::all(); 
        return view('blogs.select', compact('blogs'));
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id); 
        $blog->delete(); 
        return redirect()->route('blogs.blog')->with('success', 'Blog successfully deleted!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id); 
        return view('blogs.edit', compact('blog')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        $blog = Blog::findOrFail($id); 
        $blog->update([ 
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('blogs.blog')->with('success', 'Blog successfully updated!');
    }
}
