@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>By. <a href="/posts?author={{ $post->author->username }}"> {{ $post->author->username   }}</a> in 
        <a href="/categories/{{ $post->author->username }}">{{ $post->category->name   }}</a></p>

        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
        
        <article class="my-3 fs-5">
            {!! $post->body !!}
        </article>

        <a href="/blog">Back to Posts</a>
        </div>
    </div>
</div>
    @endsection