<?php

namespace Francis\ChatApi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Francis\ChatApi\Models\Message;

class ChatController extends Controller
{
    public function index()
    {
        // List all conversations
        return Message::get();
    }

    public function sendMessage(Request $request)
    {
        return Message::create([
            'sender_id' => $request->sender_id,
            'recipient_id' => $request->recipient_id,
            'message' => $request->message,
        ]);
    }

    public function getConversation($conversationId)
    {
        return Message::get();
    }
}
