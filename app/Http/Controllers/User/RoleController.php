<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backpanel.roles.index')->with('roles', Role::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = [
            'name' => $request->name
        ];
        $role = Role::create($data);
        return redirect()->route('role.index')->with('success', $request->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view('backpanel.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $data = [
            "name" => $request->name
        ];

        $role  = Role::find($id)->update($data);
        return redirect()->route('role.index')->with('success', $request->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::destroy($id);

        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }

    public function assignPermissionView(Role $role)
    {
        $permissions = Permission::all();

        return  view('backpanel.roles.assign_permission', compact(['role', 'permissions']));
    }

    public function assignPermission(Request $req , Role $role){


        $role->syncPermissions($req->permission);

        return back()->with('success' , 'Permission Added Successfully');
    }

}
