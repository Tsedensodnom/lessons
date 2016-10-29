<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user() != null) {
            $todos = \DB::table('todos')
                ->where('user_id', $request->user()->id)
                ->get();
            return $todos;
        }
        return response('Unauthorized', 401);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //ene function-iig ashiglahgui
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user() != null) {
            \DB::table('todos')
                ->insert([
                    'content' => $request->get('content'),
                    'user_id' => $request->user()->id,
                    'created_at' => \DB::raw('NOW()'),
                    'updated_at' => \DB::raw('NOW()'),
                ]);
            return response('TodoCreated', 200);
        }
        return response('Unauthorized', 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->user()) {
            $todo = \DB::table('todos')
                ->where('id', $id)
                ->where('user_id', $request->user()->id)
                ->update([
                    'content' => $request->get('content'),
                    'status' => $request->get('status'),
                ]);
                
            return response('Updated.', 200);
        }
        return response('Unauthorized.', 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user() != null) {
            \DB::table('todos')
                ->where('id', $id)
                ->where('user_id', $request->user()->id)
                ->delete();
                
            return response('TodoDelete', 200);
        }
        return response('Unauthorized', 401);
    }
}
