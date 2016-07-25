<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function login (LoginRequest $request) {
        if (\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return response('Authenticated.', 200);
        }
        return response('Unauthorized.', 401);
    }
    
    public function logout () {
        \Auth::logout();
        return response('Logged out.', 200);
    }
    
    public function signup (SignUpRequest $request) {
        return \App\User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => \Hash::make($request->get('password')),
        ]);
    }
}
