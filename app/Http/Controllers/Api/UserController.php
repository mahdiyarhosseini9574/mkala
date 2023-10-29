<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\User\StoreUserService;
use App\Http\Services\User\UserService;
use App\Models\User;
use App\Repositoryes\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends ApiBaseController
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, UserRepositoryInterface $repository)

    {
//        $user = User::first();
//        $roles= Role::get();
//        $user->roles()->sync([1,2,3]);
//        $user->roles()->attach([1,2,3]);
//        $user->roles()->detach([1,2,3]);
        $users =$repository->query()->where('id', '>', 1)->get();
        return $this->successResponse(UserResource::collection($users));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, StoreUserService $service)
    {
        $user = $service->handle($request->validated());
        return $this->successResponse(UserResource::make($user));

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->successResponse(UserResource::make($user->load(
            'blogs','products','images','likes','views','comments')));


    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user ,UserService $service)
    {
        $user = $service->update($user,$request->validated());
        return $this->successResponse(UserResource::make($user));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $this->successResponse($user->delete());


    }
    public function restore($id, UserRepositoryInterface $repository)
    {
        return $repository->restore($id);

    }

    public function forcedelete($id, UserRepositoryInterface $repository)
    {
        return $repository->forcedelete($id);
    }
}
