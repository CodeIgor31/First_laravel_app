@extends('layouts.application')
@section('contents')
    <a href="{{route('post.edit', $post->id)}}" class="btn btn-success mb-2">Update</a>
    <div>
        {{$post->id}}. {{$post->title}}
    </div>
    <div>
        {{$post->post_content}}
    </div>
    <div>
        <form action="{{route('post.destroy', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mt-1 mb-1">Delete post</button>
        </form>
    </div>
    <a href="{{route('post.index')}}" class="btn btn-warning mt-1">Back</a>
@endsection
