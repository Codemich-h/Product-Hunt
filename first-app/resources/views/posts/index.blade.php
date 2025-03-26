
@extends('layouts.app')

@section('content')
@if (count($posts))
        @foreach ($posts as $post)
            <div>
                {{ $post['id'] }}: {{ $post['title'] }}
            </div>
        @endforeach
    
    @else 
        There are no post

    @endif 

    @endsection