@extends('layout.layout')

@section('titel', 'account')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Account</h1>
    <p>Welcome {{ Auth::user()->name }}</p>
    <ul>
    <li>account details</li>
    <li><a href="{{route('msgview')}}">messages</a></li>
    <li>Your posts</li>
    <li>your comments</li> 
    </ul>

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
