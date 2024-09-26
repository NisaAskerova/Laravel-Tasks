<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('blogs')->paginate(3);
        return $categories;
        return view('categories.index', compact('categories'));
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
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
