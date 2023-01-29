@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            <list-blogs-component :user_id="{{ Auth::user()->id }}"></list-blogs-component>
        @endauth
        @guest
            <list-blogs-component></list-blogs-component>
        @endguest
    </div>
@endsection