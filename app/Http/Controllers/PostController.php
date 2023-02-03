<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $post = Post::first();
//        echo $post;
//        dd($post);
//        dump($post);

//        $posts = Post::all();
//        foreach ($posts as $post) {
//            dump($post->title);
//        }

//         $posts = Post::where('is_published', 1)->get();
//         foreach ($posts as $post) {
//             dump($post->title);
//         }

//         $post = Post::where('is_published', 1)->first();
//         dump($post);

        $myPosts = Post::all();
        return view('post.index', compact('myPosts'));
    }

    public function create()
    {
        return view('post.create');
//        $postsArr = [
//            [
//                'title'=>'From storm',
//                'post_content'=>'From storm content',
//                'image'=>'From storm img',
//                'likes'=>100,
//                'is_published'=>1
//            ],
//            [
//                'title'=>'sec From storm',
//                'post_content'=>'sec From storm content',
//                'image'=>'sec From storm img',
//                'likes'=>11,
//                'is_published'=>1
//            ]
//        ];
//        foreach ($postsArr as $item) {
//            Post::create($item);
//        }
//        Post::create([
//           'title'=>'solo',
//           'post_content'=>'solo content',
//           'image'=>'solo_image',
//           'likes'=>12,
//           'is_published'=>1
//        ]);
//        dd('loaded');
    }

    public function store()
    {
        $data = request()->validate([
           'title' => 'string',
           'post_content' => 'string',
           'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
        dd($data);
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }
    public function update(Post $post)
    {
        $data = request()->validate([
           'title' => 'string',
           'post_content' => 'string',
           'image' => 'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
//        Post::find(6)->update([
//            'title' => 'updated',
//            'post_content' => 'updated'
//        ]);
//        dd('updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete()
    {
        //Soft delete
        Post::first()->delete();
        dump('deleted');

    }
    public function revdelete()
    {
        //Восстановление deleted данных
        Post::onlyTrashed()->first()->restore();
        dump('restored');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate(
            [
                'title' => 'first or create'
            ],
            [
                'title'=>'first or create',
                'post_content'=>'first or create content',
                'image'=>'FoC_image',
                'likes'=>12,
                'is_published'=>1
            ]
        );
        dd($post->post_content);
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate(
            [
                'title' => 'not updated'
            ],
            [
                'title'=>'not updated',
                'post_content'=>'not updated content',
                'image'=>'FoC_image',
                'likes'=>12,
                'is_published'=>1
            ]
        );
        dd($post->post_content);
    }
}
