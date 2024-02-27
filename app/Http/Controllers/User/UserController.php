<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public $roles;
    public function __construct()
    {
        $this->roles = Role::all();
    }

    public function index()
    {
        $users = User::all();
        return view("backpanel.users.index", compact(var_name: 'users'));
    }

    public function create()
    {
        return view('backpanel.users.create')->with('roles', $this->roles);
    }

    public function store(UserRequest $req)
    {
        $user = User::create([
            "name" => $req->name,
            "email" => $req->email,
            "password" => $req->password
        ]);
        $user->addMedia($req->avatar)->toMediaCollection('user_avatar');
        $user->assignRole('author');
        return redirect()->route('user.index')->with('success', $req->name . ' user created successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $userRoles = $user->getRoleNames();
        return view('backpanel.users.edit', compact('user'))
            ->with('AllRoles', $this->roles)
            ->with('role', $userRoles[0]);
    }

    public function update(Request $req, User $user)
    {
        $user->update([
            "name" => $req->name,
            "email" => $req->email,
            "password" => $req->password,
        ]);
        $user->syncRoles($req->role);

        if ($req->hasFile('avatar')) {
            $user->media()->delete();
            $user->addMedia($req->avatar)
                ->toMediaCollection('user_avatar');
        }

        return redirect()->route('user.index')->with('success', $req->name . ' updated successfully');
    }

    public function destroy($user)
    {
        User::destroy($user);
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

    public function registerUser(){
        return view('auth.register');
    }


    public function storeUser(Request $req){
        $user = User::create([
            "name" => $req->name,
            "email" => $req->email,
            "password" => $req->password
        ]);
        $user->addMedia($req->avatar)->toMediaCollection('user_avatar');
        $user->assignRole('author');
        return redirect()->route('user.index')->with('success', $req->name . ' user created successfully');
    }
}
