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

    public function update(Request $request, $id)
    {
    	$iam = $request->user();

    	$request->validate([
	        'name' => 'string',
	    ]);
    	
    	$event = Event::where('id', $id)->first();

	    $event->update([
	        'name' => $request->name,
	        'date' => $request->date
	    ]);

	    return response()->json([
	        'message' => 'Successfully Update Event!'
	    ], 200);
    }

    public function destroy($id)
    {
    	Event::destroy($id);

    	return response()->json([
	        'message' => 'Successfully Delete Event!'
	    ], 200);
    }
}
