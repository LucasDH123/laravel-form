@extends('layout.layout')

@section('titel', 'accuire key')

@section('navbar')
    @parent
@endsection

@section('content')
   <h1>API key</h1>
   <p>On this page you can aqquire an API key, note that getting a new key overwrites your previous key</p>
   
   <a href="{{route('newkey')}}">new key</a><br>
   
@endsection