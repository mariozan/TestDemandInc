@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            <list-answers-component :user_id="{{ Auth::user()->id }}" :blog_id="{{ $blogId }}"></list-answers-component>
        @endauth
        @guest
            <list-answers-component></list-answers-component>
        @endguest
    </div>
@endsection