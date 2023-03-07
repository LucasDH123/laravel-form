@extends('layout.layout')

@section('titel', 'confirm')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Confirm deletion</h1>
    <p>Are you sure you wish to delete your post? This cannot be reversed.</p>

    <h3><a href="{{route('deletepost', ['post_id' => $id])}}" style="color:red">Yes, delete post</a></h3><h3><a style="color:green" href="{{route('posts')}}">No, don't delete post</a></h3>

    @if (Session::has('msg'))
    <div>
    <p>{{ Session::get('msg') }}</p>
    </div>
    @endif

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
