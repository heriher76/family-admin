<?php

namespace App\Http\Controllers\Api\Family;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChildController extends Controller
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|confirmed'
    ]);
    $user = new User([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);
    $user->save();
    return response()->json([
        'message' => 'Successfully created user!'
    ], 201);
}
