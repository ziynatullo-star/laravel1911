<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
   public function login(){

           $credentials = request(['email', 'password']);
       if (!$token = auth()->attempt($credentials)) {
           return response()->json(['error' => 'Unauthorized'], 401);
       }
       $token = auth()->user()->createToken('authToken')->accessToken;
       return response()->json(['token' => $token, 'user' => auth()->user()]);
   }
}
