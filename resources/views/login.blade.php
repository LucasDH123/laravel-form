@extends('layout.layout')

@section('titel', 'Login')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Login</h1>
    <p>enter your information below.</p>

    <form action="{{ route('loggingIn')}}" method="post">
    {{ csrf_field() }}
        <input type="text" name="name" placeholder="username"><br>
        <input type="password"  name="password" placeholder="password"><br>
        <input type="submit"  value="login">
    </form>

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
