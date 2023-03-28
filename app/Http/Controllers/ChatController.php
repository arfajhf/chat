<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // public function index()
    // {
    //     return view('chat');
    // }

    public function send(Request $request){
        $request->validate([
            'name'=>'required',
            'message'=>'required'
        ]);

        $message = [
            'name'=>$request->name,
            'message'=>$request->message,
        ];

        ChatEvent::dispatch($message);
    }
}
