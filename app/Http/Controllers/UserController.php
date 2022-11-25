<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;



class UserController extends Controller
{

    // INDEX
    public function index()
    {
        return UserResource::collection(User::all());
    }

    // STORE with VALIDATE
    public function store(StoreUserRequest $request)
    {
        return UserResource::make(User::create($request->validated()));
    }


    // SHOW
    public function show($id)
    {
        return UserResource::make(User::where('id', $id)->firstOrFail());
    }

    // UPDATE with VALIDATE
    public function update(StoreUserRequest $request, $id)
    {
        $update = User::where('id', $id)->update($request->validated());

        if ($update == 1) {
            UserResource::make($update);
            return response()->json([
                "Message" => "Updated user succesfully"
            ]);
        } else {
            return response()->json([
                "Status" => "Error Update"
            ], 404);
        };
    }

    // DESTROY
    public function destroy($id)
    {
        $user_deletd = UserResource::make(User::where('id', $id)->firstOrFail());
        $delete = User::where('id', $id)->delete();

        if ($delete == 1) {
            return response()->json([
                "Message" => "User deleted succesfully",
                "user deleted"  => $user_deletd
            ], 200);
        } else {
            return response()->json([
                "Message" => "Not found"
            ], 404);
        }
    }
}

