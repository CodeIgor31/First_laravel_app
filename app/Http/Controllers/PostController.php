<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckDataRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

//        $post=Post::find(1); Много ко многим, смотреть в модель Post
//        dd($post->tags);

//        $tag = Tag::find(2); Много ко многим, смотреть в модель Tag
//        dd($tag->posts);


//        $categories = Category::find(1); Смотреть в модель Category 1 ко многим
//        dd($categories->posts);

//        $post = Post::find(2); Смотреть в модель Post 1 ко многим
//        dd($post->category);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
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

    public function store(CheckDataRequest $request)
    {
        $data = $request->validated();
        if ( isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);

            $post = Post::create($data);
            $post->tags()->attach($tags); //tags() - query(Запрос в базу данных). Атач для привязки, он принимает массив
        }
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(CheckDataRequest $request, Post $post)
    {
        $data = $request->validated();
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

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
                'title' => 'first or create',
                'post_content' => 'first or create content',
                'image' => 'FoC_image',
                'likes' => 12,
                'is_published' => 1
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
                'title' => 'not updated',
                'post_content' => 'not updated content',
                'image' => 'FoC_image',
                'likes' => 12,
                'is_published' => 1
            ]
        );
        dd($post->post_content);
    }
}
