@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container flex justify-center mt-20">
        <div class="row">
            <div class="col-lg-4 ms-auto">
                <p class="lead ml-50">{{ $viewData['description'] }}</p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead ml-50">{{ $viewData['dev'] }}</p>
            </div>
        </div>
    </div>
@endsection
