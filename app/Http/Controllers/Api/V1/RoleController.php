<?php

namespace App\Http\Controllers\Api\V1;

use App\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\Role as RoleResource;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        return new RoleResource(Role::with(['permission'])->get());
    }

    public function show($id)
    {
        $role = Role::with(['permission'])->findOrFail($id);

        return new RoleResource($role);
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permission()->sync($request->input('permission', []));

        return (new RoleResource($role))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        $role->permission()->sync($request->input('permission', []));

        return (new RoleResource($role))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response(null, 204);
    }}
