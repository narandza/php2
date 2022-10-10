<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private $rules =[
        'title' => 'required|max:200',
        'slug' => 'required|max:200',
        'excerpt' => 'required|max:300',
        'category_id' => 'required|numeric',
        'thumbnail' => 'required|file|mimes:jpg,png,webp,svg,jpeg|dimensions:min_width=300,min_height=227',
        'body' => 'required',
    ];
    public function index()
    {
        return view('admin_dashboard.posts.index',[
            'posts' => Post::with('category')->orderBy('id','desc')->paginate(50)
        ]);
    }


    public function create()
    {

        return view('admin_dashboard.posts.create',[
                'categories' => Category::pluck('name', 'id')
            ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);

        if($request->has('thumbnail')){

            $thumbnail =$request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');

            $post->image()->create([
                'name'=>$filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        $tags= explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach ($tags as  $tag){
            $tag_obj = Tag::create(['name'=>$tag]);
            $tags_ids[]= $tag_obj->id;
        }
        if(count($tags_ids)> 0)
            $post->tags()->sync($tags_ids);

        return redirect()->route('admin.posts.create')->with('success', 'Post has been created');
    }


    public function show($id)
    {
        //
    }


    public function edit( Post $post)
    {
        $tags='';
        foreach ($post->tags as $key=> $tag){
            $tags .= $tag->name;
            if($key !== count($post->tags) -1)
                $tags .= ',';
        }

      return view('admin_dashboard.posts.edit',[
          'post'=>$post,
          'tags' => $tags,
          'categories' => Category::pluck('name', 'id'
          )]);
    }


    public function update(Request $request, Post $post)
    {
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=300,max_height=227';
        $validated = $request->validate($this->rules);
        $post->update($validated);

        if($request->has('thumbnail')){
            $thumbnail =$request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');

            $post->image()->update([
                'name'=>$filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }
        $tags= explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach ($tags as  $tag){
            $tag_exists = $post->tags()->where('name',trim($tag))->count();
            if($tag_exists == 0){
                $tag_obj = Tag::create(['name'=>trim($tag)]);
                $tags_ids[]= $tag_obj->id;
            }

        }
        if(count($tags_ids)> 0)
            $post->tags()->syncWithoutDetaching($tags_ids);
        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post has been updated');
    }


    public function destroy(Post $post)
    {
        $post->tags()->delete();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','Post has been Deleted.');
    }
}
