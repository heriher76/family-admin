<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;

class ChatController extends Controller
{
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
