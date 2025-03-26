@extends('layouts.app')

@section('content')

     @if (session()->hass('status'))
     <div>
        {{ session()->get('status') }}
     </div>
    {{ $id }}

@endsection