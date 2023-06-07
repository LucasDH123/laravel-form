<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use app\Models\User;

class MessageController extends Controller
{
    public function messageView() {
        $messages = Message::all();
        $users = User::all();
        
        return view('user_messages')->with('messages', $messages)->with('users', $users);
    }

    public function messageFormView() {
        return view('message_form');
    }

    public function DirectMessageStore(Request $request) {
        $request->validate([
            'fromUser' => 'required|integer',
            'name' => 'required|max:25|exists:users',
            'message' => 'required'

        ]);

        $fromUser = (int) $request->fromUser;
        $toUser = DB::table('users')->where('name', '=', $request->name)->first();

        $message = new Message();
        $message->sender_id = $fromUser;
        $message->recipient_id = $toUser->id;
        $message->message = $request->message;

        $message->save();

        return Redirect::to('/user_messages', ['box' => 'inbox'])->with('msg', 'message has been sent');
    }
}
