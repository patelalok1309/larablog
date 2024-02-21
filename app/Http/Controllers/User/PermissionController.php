<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backpanel.permissions.index')->with('permissions' , Permission::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $data = [
            'name' => $request->name
        ];
        $permission = Permission::create($data);
        return redirect()->route('permission.index')->with('success', $request->name . ' created successfully');
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
        $permission = Permission::find($id);
        return view('backpanel.permissions.edit')->with('permission' , $permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $data = [
            "name" => $request->name
        ];

        $permission  = Permission::find($id)->update($data);
        return redirect()->route('permission.index')->with('success', $request->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::destroy($id);

        return redirect()->route('permission.index')->with('success' , 'permission deleted successfully');
    }
}
