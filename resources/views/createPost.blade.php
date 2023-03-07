@extends('layout.layout')

@section('titel', 'Create post')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Create post</h1>
    <p>create a post!</p>
    <form action="{{route('storepost')}}" method="post">
    {{ csrf_field() }}
        <input type="text" name="title" placeholder="Post title"><br>
        <textarea name="content" placeholder="Post contents"  rows="10" cols="20"></textarea><br>
        <input type="submit" value="submit"><br>
    </form>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection