@extends('layout.layout')

@section('titel', 'messages')

@section('navbar')
    @parent
@endsection

@section('content')
<h1>{{ Auth::user()->name }}'s messages</h1>

<a href="/message_form">Send a message</a> <a class="inbox_link" href="{{route('msgview', ['box' => 'inbox'])}}">inbox</a> <a class="outbox_link" href="{{route('msgview', ['box' => 'outbox'])}}">outbox</a> 
<br>
<br>

@if (request()->is('*/inbox')) 
    <table>
        <tr>
            <th>Sender</th><th>date recieved</th><th>Message</th>
        </tr>
        
        @foreach ($messages AS $message)
            @if ($message->sender_id !== Auth::user()->id)
        <tr>
            <td>
                @foreach ($users AS $user)
                @if ($user->id === $message->sender_id)
                    {{$user->name}}
                @endif
                @endforeach
            </td>
            <td>
                {{$message->created_at}}
            </td>
            <td>
                {{$message->message}}
            </td>
        </tr>
            @endif
        @endforeach
    </table>
@endif

@if (request()->is('*/outbox')) 

    <table>
        <tr>
            <th>Target</th><th>date recieved</th><th>Message</th>
        </tr>

        @foreach ($messages AS $message)
            @if ($message->sender_id = Auth::user()->id)
        <tr>
            <td>
                @foreach ($users AS $user)
                @if ($user->id === $message->recipient_id)
                    {{$user->name}}
                @endif
                @endforeach
            </td>
            <td>
                {{$message->created_at}}
            </td>
            <td>
                {{$message->message}}
            </td>
        </tr>
            @endif
        @endforeach
    </table>
@endif
   
@endsection