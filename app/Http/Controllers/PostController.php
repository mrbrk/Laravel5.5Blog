<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Like;
use Illuminate\Http\Request;
use Validator;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $posts = Post::all();
        $users = User::orderBy('name','asc')->get();
        $user = Auth::user();

        return view('blog.post.posts',compact('posts','users','user'));
    }

    /**
     * Show the fposorm for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $tags = Tag::all();
        $user = Auth::user();
        $categories = Category::all();
        return view('blog.post.create',compact('counter','posts','tags','likes','users','categories','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $validator = Validator::make($request->all(),
            [
                'title'                  => 'required|max:255|unique:posts',
                'body'            => 'required',
                'category_id'            => 'required|max:55',
                'tags'          => 'required',
                'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


            ],
            [
                'title.required'           => 'Title Required',
                'title.max'           => 'Title should be max 255 character',
                'title.unique'           => 'Title should be Unique',
                'category.required'           => 'Title Required',
                'category.max'           => 'Title should be max 255 character',
                'category.unique'           => 'Title should be Unique',
                'body'           => 'Content Required',
                'tags'           => 'at least 1 tag please',

            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        
        $image = $request->file('image_name');        
        
        $image_name = $image->getClientOriginalName();

        $destinationPath = public_path('/images');

        $path = public_path('images/' . $image_name);

        Image::make($image)->resize(900, 300)->save( $path );

        // $image->move($destinationPath, $image->getClientOriginalName());

        $file_name = $image->getFilename().'.'.$image->getClientOriginalExtension();
        
        $extension = $image->getClientOriginalExtension();

        $post = Post::create([
            'title'              => $request->input('title'),
            'body'        => $request->input('body'),
            'slug'         => str_slug($request->input('title'),'-'),
            'category_id'         => $request->input('category_id'),
            'image_name'         => $image_name,
            'mime'         => $extension,
            'original_filename'         => $file_name,
            'user_id'             => Auth::id(),
        ]);

        $tags = $request->input('tags');

        $post->tag()->sync($tags);

        $post->save();

        return redirect('blog/posts/')->with('success', 'Succesfully Created Post');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $post->view += 1;
        $post->save();
        $user = Auth::user();
        // $tags = Tag::where('post_id',$post->id)->get();
        return view('blog.post.post',compact('post','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentUser = Auth::user();
        $post = Post::findOrFail($id);

        if ( $post->user->id === $currentUser->id || $currentUser->isAdmin() ) {
            $post->delete();

            return redirect('blog/posts')->with('success', 'Succesfully deleted post');
        }

        return back()->with('error', 'You cant delete anybodies post!');
    }
    /**
     * Add a comment to a Post by authorized user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function postComment(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'body'                  => 'required',
            ],
            [
                'body.required'           => 'Body Required',
                'commentable_type.required'           => 'Commentable Required (Ask the web admin)',
                'commentable_id.required'           => 'Commentable id required (Ask the web admin)',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $comment = Comment::create([
            'body'              => $request->input('body'),
            'user_id'             => Auth::id(),
            'commentable_id'    =>  $request->input('body'),
            'commentable_type' =>  $request->input('body'),
        ]);
        return back()->with('success', 'Succesfully Created Post');
    } 

    public function dash()
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

        return view("dashboard",compact('counter','posts','tags','likes','users','categories','user'));
    }   

  
}