<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $users = User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=> Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Succesful',
            'user' => new UserResource($users)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json([
            'user' => new UserResource($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $name=$request->fullname;
        $email=$request->email;
        $password=$request->password;

        $user = $user->update([
            "name"=>$name,
            "email"=>$email,
            "password"=> Hash::make($request->$password),
        ]);

        return response()->json([
            'message' => 'Succesful',
            'user' => new UserResource($user)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ]);
        }
        return response()->json([
            'message' => 'User Deleted',
        ]);
    }
}
