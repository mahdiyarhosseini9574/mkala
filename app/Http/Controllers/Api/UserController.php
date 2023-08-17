<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\Product\ProductService;
use App\Http\Services\User\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiBaseController
{
    private UserService $userservice;

    public function __construct(UserService $userservice)
    {
        $this->userservice = $userservice;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $user = User::first();
        $roles= Role::get();
        $user->roles()->sync([1,2,3]);
//        $user->roles()->attach([1,2,3]);
//        $user->roles()->detach([1,2,3]);
        return $user->load('roles');
        $users = User::where('id', '>', 1)->get();
        return $this->successResponse(UserResource::collection($users));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = $this->userservice->store($request->validated());
        return $this->successResponse(UserResource::make($user));

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->successResponse(UserResource::make($user));


    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user = $this->userservice->update($request->validated());
        return $this->successResponse(UserResource::make($user));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->successResponse(UserResource::make($user));

    }
}
