@extends('layout.layout')

@section('titel', 'Register')
    
@section('navbar')
    @parent
@endsection

@section('content')
<h1>Register</h1>
    <form action='{{route("regiUser")}}' method="post">
    {{ csrf_field() }}
        <input type="email" name="email" placeholder="email"><br>
        <input type="text"   name="name" placeholder="username"><br>
        <input type="password"  name="password" placeholder="password"><br>
        <input type="password"  name="password_confirmation" placeholder="confirm password"><br>
        <input type="submit" name="register" value="make account"><br>
    </form><br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li dusk="register_error ">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

