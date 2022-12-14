<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $posts = Post::withCount('comments')->orderBy('id','desc')->paginate(10);
        $recent_posts = Post::latest()->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();

      return view('home', [
          'posts'=> $posts,
          'recent_posts' =>  $recent_posts,
          'categories' => $categories,
          'tags' => $tags
      ]);
    }
}
