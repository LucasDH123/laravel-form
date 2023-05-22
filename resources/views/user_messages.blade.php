@extends('layout.layout')

@section('titel', 'accuire key')

@section('navbar')
    @parent
@endsection

@section('content')
<h1>{{ Auth::user()->name }}'s messages</h1>

<a id="inbox_link" href="inbox">inbox</a><a id="outbox link" href="outbox">outbox</a> 
   
@endsection