<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        /** @var User user */

        $user = Auth::user();
        $profile = $user->profile;
        $posts = $user->posts;

        return view ('profile', ['profile' => $profile, 'user' => $user, 'posts' => $posts]);
    }
    public function users()
    {
        $users = \App\Models\User::with('roles')->get();
        $roles = \App\Models\Role::with('users')->get();
        
        return view('users', compact('users', 'roles'));
    }

}
