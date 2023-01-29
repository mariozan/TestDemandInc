@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            <create-answer-component :user_id="{{ Auth::user()->id }}" :blog_id="{{ $blogId }}"></create-answer-component>
        @endauth
        @guest
            <create-blogs-component></create-blogs-component>
        @endguest
    </div>
@endsection