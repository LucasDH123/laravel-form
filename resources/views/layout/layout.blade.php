<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/style.css') }}">
    <title>@yield('titel')</title>
</head>
<body>
@section('navbar')
<div id='navbar'>
    <nav>
        <a href="{{ route('main') }}">Home</a>
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('posts') }}">Posts</a>

        @if (Auth::check())
        <a class="log-out" href="{{route('logout')}}">LogOut</a>
        <a href="{{route('keyview')}}">API</a>
        <a href="{{route('accountmenu')}}">Account</a>
        @endif
        @if (!Auth::check())
        <a href="{{ route('login') }}">Login</a>
        @endif
    </nav>
</div>
@show
    <div class="content">
        @yield('content')
    </div>
    
    
</body>
</html>