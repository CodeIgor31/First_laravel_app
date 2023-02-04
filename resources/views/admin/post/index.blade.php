@extends('layouts.admin')
@section('contents')
    <a href="{{route('admin.post.create')}}" class="btn btn-success mb-2">Create a new post</a>
    @foreach($myPosts as $post)
        <div><a href="{{route('admin.post.show', $post->id)}}"> {{$post->id}}. {{$post->title}}</a></div>
    @endforeach
    <div class="mt-3">
        {{$myPosts->withQueryString()->links()}}
    </div>
@endsection
