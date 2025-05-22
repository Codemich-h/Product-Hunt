@extends('layouts.app')

@section('content')
   
    <form action="{{ route( 'posts.store' )}}" method="post">
        @csrf
        <div>
            <input type="text" name="title" id="title" autocomplete="off" value="{{ old('title') }}">
                @error('title')
                <div>{{ $message }}</div>
                @enderror
                <div>
                    <textarea  name="title" id="title" autocomplete="off">{{ old('body') }}</textarea>
                       @error('body')
                    <div>{{ $message }}</div>
                       @enderror
                    <div>
                </div>
            
            <button type="submit">Post</button>
        </div> 
        
    </form>

@endsection