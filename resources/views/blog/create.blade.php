@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            <create-blog-component :user_id="{{ Auth::user()->id }}"></create-blog-component>
        @endauth
        @guest
            <create-blogs-component></create-blogs-component>
        @endguest
    </div>
@endsection