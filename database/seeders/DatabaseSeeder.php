<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Role::truncate();
        Category::truncate();
        Post::truncate();
        Tag::truncate();
        Comment::truncate();
        Image::truncate();
        Schema::enableForeignKeyConstraints();

        \App\Models\Role::factory(1)->create();
\App\Models\Role::factory(1)->create(['name'=>'admin']);

        $blog_routes = Route::getRoutes();
        $permissons_ids = [];
        foreach ($blog_routes as $route){
            if(strpos( $route->getName(),'admin') !== false){
                $permisson = \App\Models\Permission::create(['name'=>$route->getName()]);
                $permissons_ids [] = $permisson->id;
            }
        }

            Role::where('name','admin')->first()->permissions()->sync($permissons_ids);

        $users = \App\Models\User::factory(10)->create();
       \App\Models\User::factory()->create([
           'email' => 'dimitrije_admin@mail.com',
           'name'=> 'dimitrije',
           'password'=> bcrypt('lozinka123'),
           'role_id'=>2
       ]);
       \App\Models\User::factory()->create([
           'email' => 'dimitrije_user@mail.com',
           'name'=> 'dimitrije',
           'password'=> bcrypt('lozinka123'),
           'role_id'=>1
       ]);

        foreach ($users as $user){
            $user->image()->save(Image::factory()->make());
        }

        Category::factory(10)->create();
        Category::factory()->create(['name'=>'Uncategorized']);
        $posts = Post::factory(12)->create();
        Comment::factory(100)->create();
        Tag::factory(10)->create();

        foreach ($posts as $post){
            $tags_ids=[];
            $tags_ids[] = Tag::all()->random()->id;
            $tags_ids[] = Tag::all()->random()->id;
            $tags_ids[] = Tag::all()->random()->id;

            $post->tags()->sync($tags_ids);
            $post->image()->save(Image::factory()->make());
        }
        Setting::factory(1)->create();
    }
}
