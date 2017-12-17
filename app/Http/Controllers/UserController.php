<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Like;
use Illuminate\Http\Request;
use Validator;
use Auth;

class UserController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        $likes = Like::all();
        $users = User::all();
        $user = Auth::user();
        $counter = 0;
        foreach($posts as $post){
            $counter += $post->view;
        }
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('pages.admin.home',compact('counter','posts','tags','likes','users','categories','user'));
        }

        return view('pages.user.home');
    }
}
