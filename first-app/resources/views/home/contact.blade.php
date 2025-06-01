@extends('layouts.app')
@section('title', 'contact-page :Online Store')
@section('content')
    <div class="container flex justify-center mt-20">
        <div class="row">
            <div class="col-lg-4 ms-auto">
                <p class="lead ml-50">{{ $viewData['email'] }}</p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead ml-50">{{ $viewData['address'] }}</p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead ml-50">{{ $viewData['phone'] }}</p>
            </div>
        </div>
    </div>
@endsection