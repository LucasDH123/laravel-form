@extends('layout.layout')

@section('titel', 'Home')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Home</h1>
    <p>This is Home</p>
    
    @if (Auth::check())
        <p>Current user: {{ Auth::user()->name }}</p>
        @endif

@endsection