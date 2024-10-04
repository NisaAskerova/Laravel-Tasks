<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(){
        $categories = Category::all(); 
        $tags = Tag::all();
        return view('blogs.create', compact('categories', 'tags'));
     }

     public  function store(Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required|exists:categories,id',
            'tag_id'=>'required|exists:tags,id',
            'image'=>'required|image|mimes:jpg,png,gif,svg|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category_id = $request->category_id;
        $blog->tag_id = $request->tag_id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        return redirect()->route('blogs.index');
     }

     public function index(){
        $blogs = Blog::with(['category', 'tag'])->get();
        return view('blogs.index', compact('blogs'));
    }
}
