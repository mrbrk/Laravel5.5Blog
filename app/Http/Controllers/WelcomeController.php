<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Pagination\Paginator;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('welcome');
    }

    public function giris()
    {
    	$categories = Category::all();
        $tags = Tag::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);

    	return view("blog.front-office.main",compact('categories','tags','posts'));
    }

}
