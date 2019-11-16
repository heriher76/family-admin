<?php

namespace App\Http\Controllers\Api\Family;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ParentController extends Controller
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
	        'status' => $request->status,
	        'family_id' => $iam->family->id,
	        'password' => bcrypt($request->password)
	    ]);
	    $user->save();

	    return response()->json([
	        'message' => 'Successfully created Parent!'
	    ], 201);
    }
}
