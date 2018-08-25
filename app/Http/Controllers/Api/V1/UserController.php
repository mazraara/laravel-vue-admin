<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return new UserResource(User::with(['role'])->get());
    }

    public function show($id)
    {
        $user = User::with(['role'])->findOrFail($id);

        return new UserResource($user);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->role()->sync($request->input('role', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->role()->sync($request->input('role', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response(null, 204);
    }
}
