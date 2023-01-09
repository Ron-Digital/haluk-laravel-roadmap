<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

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

        //Notification::send($user, new Notify);

        return UserResource::collection($users);
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
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ]);
        }

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

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ]);
        }

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

        $user->delete();

        return response()->json([
            'message' => 'User Deleted',
        ]);
    }
    public function storeSecret(Request $request)
    {
        $request->user()->fill([
            'token' => Crypt::encryptString($request->token),
        ])->save();
    }

}
