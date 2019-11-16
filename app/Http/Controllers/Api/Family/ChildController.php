<?php

namespace App\Http\Controllers\Api\Family;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ChildController extends Controller
{
    public function store(Request $request)
    {
    	$iam = $request->user();

    	$request->validate([
	        'name' => 'required|string',
	        'email' => 'required|string|email|unique:users',
	        'password' => 'required|string|confirmed'
	    ]);

	    $user = new User([
	        'name' => $request->name,
	        'email' => $request->email,
	        'status' => 'Anak',
	        'family_id' => $iam->family->id,
	        'password' => bcrypt($request->password)
	    ]);
	    $user->save();

	    return response()->json([
	        'message' => 'Successfully created Child!'
	    ], 201);
    }

    public function destroy($id)
    {
    	$user = User::where('id', $id)->first();

    	if ($user->status == 'Anak') {
    		User::destroy($id);

	    	return response()->json([
		        'message' => 'Successfully Delete Child!'
		    ], 200);
    	}else{
	    	return response()->json([
		        'message' => 'Unauthorized!'
		    ], 403);
    	}
    }
}
