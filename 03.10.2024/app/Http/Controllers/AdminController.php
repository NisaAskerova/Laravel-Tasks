<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $blogsCount = Blog::count(); 
        $activeBlogsCount = Blog::where('is_active', 1)->count(); 

        return view('admin.dashboard.index', compact('usersCount', 'blogsCount', 'activeBlogsCount'));
    }

    public function users()
    {
        // İstifadəçilərin blog sayı ilə birlikdə alınması
        $users = User::withCount('blogs')->get();
        return view('admin.dashboard.user', compact('users'));
    }

    public function blogs()
    {
        $blogs = Blog::with('user')->get();
        return view('admin.dashboard.blog', compact('blogs'));
    }

    public function toggleBlogStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_active = !$blog->is_active; // Statusu dəyişdir
        $blog->save();

        return redirect()->route('admin.blogs')->with('success', 'Blog statusu uğurla dəyişdirildi.');
    }

    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active; 
        $user->save();

        return redirect()->route('admin.users')->with('success', 'İstifadəçi statusu uğurla dəyişdirildi.');
    }
    public function usersBlogsCount()
    {
        // Yalnız 'user' roluna sahib istifadəçiləri blog sayı ilə birlikdə əldə et
        $users = User::withCount('blogs')->where('role', 'user')->get(); 
        return view('admin.dashboard.contblog', compact('users')); // Yeni görünüşü çağır
    }
    
}
