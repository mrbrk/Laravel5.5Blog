<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Validator;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        // dd($request->invisible);
        $validator = Validator::make($request->all(),
            [
                'body'                  => 'required',
                'invisible'                  => 'required',
            ],
            [
                'body.required'           => 'Body Required',
                'invisible.required'           => 'Something went wrong...',
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $post = Post::find($request->invisible);

        $comment = new Comment([
        	'body'=>$request->body, 
        	'user_id' => Auth::id(), 
        	'commentable_id'=>$request->invisible, 
        	'commentable_type' => get_class($post)]);

        $comment = $post->comments()->save($comment);

        return back()->with('success', 'Succesfully Added Comment');

    }
}
