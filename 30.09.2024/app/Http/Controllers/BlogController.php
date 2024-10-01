<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            $imagePath = null;
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image = $imagePath;
        $blog->save();
        
        return redirect()->route('blog.index');
    }

    public function index()
    {
        $blogs = Blog::all()->sortByDesc('created_at');
        return view('blogs.index', compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $blog->image = $imagePath;
        }

        $blog->save();
        
        return redirect()->route('blog.index');
    }
    public function delete($id){
        $blog=Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route(route: 'blog.index');

    }
    public function view($id){
        $blog=Blog::findOrFail($id);
        return view('blogs.view', compact('blog'));

    }
}
