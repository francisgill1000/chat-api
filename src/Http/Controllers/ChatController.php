<?php

namespace Francis\ChatApi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Francis\ChatApi\Models\Message;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'sender_id' => 'required',
            'recipient_id' => 'required',
        ]);

        return Message::where(function ($query) use ($validated) {
            $query->where('sender_id', $validated['sender_id'])
                ->where('recipient_id', $validated['recipient_id']);
        })->orWhere(function ($query) use ($validated) {
            $query->where('sender_id', $validated['recipient_id'])
                ->where('recipient_id', $validated['sender_id']);
        })->orderBy('created_at', 'asc')->get();
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
