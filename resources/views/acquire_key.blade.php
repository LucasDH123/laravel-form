@extends('layout.layout')

@section('titel', 'accuire key')

@section('navbar')
    @parent
@endsection

@section('content')
   <h1>API key</h1>
   <p>On this page you can aqquire an API key, note that getting a new key overwrites your previous key</p>

   @if($token)
    <h2>Token has been made!</h2>
    <p>{{$token}}</p>
   @endif
   
   <a href="{{route('newkey')}}">new key</a><br>
   <a href="{{route('invalidatekey')}}">invalidate keys</a>
   
@endsection