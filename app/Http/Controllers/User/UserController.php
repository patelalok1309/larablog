<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\isNull;

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
            ->with('role', $user->getRoleNames()->first());
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

    public function registerUser()
    {
        return view('auth.register');
    }


    public function storeUser(Request $req)
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

    public function registerWithGithub()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('email', $githubUser->email)->first();
        if ($user == null) {
            $user = User::create([
                'name' => $githubUser->nickname,
                'email' => $githubUser->email,
                'password' => Hash::make('user@1234'),
            ]);
            $user->addMediaFromUrl($githubUser->picture)->toMediaCollection('user_avatar');
            $user->assignRole('author');
        }

        Auth::login($user);

        return redirect()->route('blog.home');
    }


    public function registerWithGoogle()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->email)->first();
        if ($user == null) {
            $user = User::create([
                'github_id' => $googleUser->id,
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make('user@1234'),
                'github_token' => $googleUser->token,
                'github_refresh_token' => $googleUser->refreshToken,
            ]);
            $user->addMediaFromUrl($googleUser->avatar)->toMediaCollection('user_avatar');
            $user->assignRole('author');
        }

        Auth::login($user);

        return redirect()->route('blog.home');
    }

    public function dashboard()
    {
        $users = User::all()->count();
        $posts = Post::all()->count();
        $tags = Tag::all()->count();
        $categories = Category::all()->count();
        $comments = Comment::all()->count();
        $roles = Role::all()->count();
        return view(
            'backpanel.dashboard.index',
            [
                'users' => $users,
                'posts' => $posts,
                'tags' => $tags,
                'categories' => $categories,
                'comments' => $comments,
                'roles' => $roles,
            ]
        );
    }
}
