<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Bloglar içərisində yalnız active = 1 olanları yükləyirik
        $categories = Category::with(['blogs' => function ($query) {
            $query->where('active', 1);
        }])->paginate(3);
    
        // Hər bir kateqoriyada yalnız active = 1 olan bloglar olacaq
        $activeBlogs = $categories->pluck('blogs')->flatten();
    return $activeBlogs;
        return view('categories.index', compact('activeBlogs', 'categories'));
    }
    
    public function edit($id)
    {
        $category = Category::with('blogs')->findOrFail($id);
    
        // Collection ilə yalnız active = 1 olan blogları süzürük
        // $activeBlogs = $category->blogs->where('active', 1);
        //     return $activeBlogs;

        return view('categories.edit', compact('activeBlogs'));
    }
    


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->blog_id = $request->blog_id;
        $category->save();
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route(route: 'categories.index');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'blog_id' => 'required',
        ]);
        $category = new Category();
        $category->blog_id = $request->blog_id;
        $category->name = $request->name;
        $category->save();
        return redirect()->route(route: 'categories.index');
    }



    public function create()
    {
        return view('categories.create');
    }
}
