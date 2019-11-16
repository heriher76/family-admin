<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
    	$iam = $request->user();

    	$request->validate([
	        'name' => 'required|string',
	        'date' => 'required'
	    ]);

	    $event = new Event([
	        'name' => $request->name,
	        'date' => $request->date,
	        'family_id' => $iam->family->id
	    ]);
	    $event->save();

	    return response()->json([
	        'message' => 'Successfully created Event!'
	    ], 201);
    }
}
