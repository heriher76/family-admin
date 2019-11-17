<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;

class ChatController extends Controller
{
	public function index(Request $request)
	{
    	$iam = $request->user();
    	$chats = Chat::where('family_id', $iam->family->id)->with('Family')->with('User')->get();
		
		return response()->json([
	        'data' => $chats
	    ], 200);    	
	}
    public function store(Request $request)
    {
    	$iam = $request->user();

    	$request->validate([
	        'message' => 'required|string'
	    ]);
	    
	    $chat = new Chat([
	        'message' => $request->message,
	        'user_id' => $iam->id,
	        'family_id' => $iam->family->id
	    ]);
	    $chat->save();

	    return response()->json([
	        'message' => 'Successfully created Chat!'
	    ], 201);
    }
}
