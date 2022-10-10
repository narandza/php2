<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        return view('admin_dashboard.index', [
            'posts' => Post::all(),
            'recent_posts' => Post::latest()->paginate(10),
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'users' => User::all()
        ]);
    }
}
