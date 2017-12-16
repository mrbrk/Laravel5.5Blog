<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Auth;


class LikeController extends Controller
{
    public function postLike(Request $request)
    {
        $id = $request['id'];

        $post = Post::find($id);

        $like = new Like;
        $like->user_id = Auth::id();
        $like->likeable_id = $id;
        $like->likeable_type = get_class($post);

        $post->likes()->save($like);
        return back();

    }
    
    public function postUnlike(Request $request)
    {
    	$id = $request['id'];

    	$like = Like::where('user_id',Auth::id())->with('likeable_id',$id);

    	$like->delete();

        return back();
    }
}
