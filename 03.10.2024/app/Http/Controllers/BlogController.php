<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::id();
        $blog->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $blog->image = $imagePath; 
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog uğurla yaradıldı.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id != Auth::id()) {
            return redirect()->route('blogs.index')->withErrors('Siz bu blogu redaktə edə bilməzsiniz.');
        }

        return view('blogs.edit', compact('blog'));
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $blog = Blog::findOrFail($id);

    if ($blog->user_id != Auth::id()) {
        return redirect()->route('blogs.index')->withErrors('Siz bu blogu yeniləyə bilməzsiniz.');
    }

    $blog->title = $request->title;
    $blog->content = $request->content;

    if ($request->hasFile('image')) {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $imagePath = $request->file('image')->store('blog_images', 'public');
        $blog->image = $imagePath;
    }

    $blog->save();

    return redirect()->route('blogs.myblogs')->with('success', 'Blog uğurla yeniləndi.');
}

    
    public function index()
    {
        $blogs = Blog::where('is_active', 1)->get(); 
        return view('blogs.index', compact('blogs'));
    }
    public function myBlogs()
{
    $blogs = Blog::where('user_id', Auth::id())->get(); 
    return view('blogs.myblogs', compact('blogs')); 
}
}

