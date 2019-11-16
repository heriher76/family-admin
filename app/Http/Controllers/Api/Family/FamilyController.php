<?php

namespace App\Http\Controllers\Api\Family;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Family;

class FamilyController extends Controller
{
	// public function __construct()
	// {
	// 	$this->middleware('auth:api',['except' => 'store']);
	// }

    public function store(Request $request)
    {
    	$input = $request->all();

    	$family = Family::create([
    		'name' => $input['name']
    	]);

    	$iam = $request->user();
    	
    	if ($iam->id_keluarga == null) {
    		$iam->update([
    			'family_id' => $family->id
    		]);
    	}

    	return response()->json([
            'message' => 'Successfully created family!'
        ], 201);
    }
}
