<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    protected $user;

    public function __construct
    (
        User $user
    )
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $user = $this->user;
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->password = bcrypt($inputs['password']);
        $user->save();

        return response()->json(['status' => 'User Created'], 200);
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
    public function update(Request $request, User $user)
    {
        $inputs = $request->all();

        if (empty($inputs['name']) || is_null($inputs['name'])) {
            unset($inputs['name']);
        } else {
            $user->name = $inputs['name'];
        }

        if (empty($inputs['email']) || is_null($inputs['email'])) {
            unset($inputs['email']);
        } else {
            $user->email = $inputs['email'];
        }

        $user->save();

        return response()->json(['status' => 'User Updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['status' => 'User Deleted'], 200);
    }
}
