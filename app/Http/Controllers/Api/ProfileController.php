<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
    	$iam = $request->user();

    	$request->validate([
	        'name' => 'string',
	        'email' => 'string|email',
	        'password' => 'string|confirmed'
	    ]);

    	if ($request->password != null) {
    		$iam->update([
		        'name' => $request->name,
		        'email' => $request->email,
		    	'password' => bcrypt($request->password)
		    ]);	
    	}else{
    		$iam->update([
		        'name' => $request->name,
		        'email' => $request->email
		    ]);
    	}

	    return response()->json([
	        'message' => 'Successfully Update Profile!'
	    ], 200);
    }
}
