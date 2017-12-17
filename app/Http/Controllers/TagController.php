<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Auth;
use Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tags = Tag::all();
        return view('blog.tags.tags',compact('tags'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.tags.create');
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
                'name'                  => 'required|max:55|unique:tags',
                'slug'                  => 'required|max:55|unique:tags',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $tag = Tag::create([
            'name'              => $request->input('name'),
            'slug'              => $request->input('slug'),
        ]);


        $tag->save();

        return redirect('blog/tags')->with('success', 'Succesfully created tag');
        // foreach($tags as $tag){
        //     // print_r($tag.'<br/>');
        //     $validator = Validator::make($request->all(),
        //     [
        //         'name'                  => 'required|max:55|unique:tags',
        //     ]
        // );
        //             if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        // $tag = Tag::create([
        //     'name'              => $tag,
        //     'slug'              => $slug,
        // ]);

        // $tag->save();

        // }

        // return redirect('blog/tags')->with('success', 'Succesfully created tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $posts = Tag::find($id);
        $tag = Tag::where('slug',$slug)->first();
        return view('blog.tags.tag',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('blog.tags.edit',compact('tag'));
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
        $tag = Tag::findOrFail($id);
        $validator = Validator::make($request->all(),
                [
                    'name'                  => 'required|max:55|unique:tags',
                    'slug'                  => 'required|max:55|unique:tags',

                ]
            );

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $tag->name = $request->name;
            $tag->slug = $request->slug;

            if($tag->save()){
                return redirect('blog/tags/')->with('success', 'Succesfully Edited Tag');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $currentUser = Auth::user();

        if ( $currentUser->isAdmin() ) {
            $tag->delete();

            return redirect('blog/tags')->with('success', 'Succesfully deleted tag');
        }

        return back()->with('error', 'You cant are not admin!');
    }
}
