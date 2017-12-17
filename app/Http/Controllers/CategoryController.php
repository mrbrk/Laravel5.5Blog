<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Auth;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('blog.categories.categories',['categories'=>$categories,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('blog/categories/create',compact('user'));
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
                'name'                  => 'required|max:255|unique:categories',
                'slug'                  => 'required|max:255|unique:categories',
                
            ],
            [
                'name.required'           => 'Category Name Required',
                'name.max'           => 'Category Name should be max 255 character',
                'name.unique'           => 'Category Name should be Unique',

                'slug.required'           => 'Category Name Required',
                'slug.max'           => 'Category Name should be max 255 character',
                'slug.unique'           => 'Category Name should be Unique',


            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $category = Category::create([
            'name'              => $request->input('name'),
            'slug'              => $request->input('slug'),
        ]);

        $category->save();

        return redirect('blog/categories/')->with('success', 'Succesfully Created Category');
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::where('slug',$slug)->first();
        dd($category->name);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $category = Category::findOrFail($id);
        return view('blog.categories.edit',compact('category','user'));
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


        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        // $category->save();
        if($category->save()){
            return redirect('blog/categories/')->with('success', 'Succesfully Edited Category');
        }        
        // dd([$category, $category->name , $request->name]);


        // $name = $category->name;
        // dd($name);
        // $validator = Validator::make($request->all(),
        //     [
        //         'name'                  => 'required|max:255|unique:category',
                
        //     ],
        //     [
        //         'name.required'           => 'Name Required',
        //         'name.max'           => 'Name should be max 255 character',
        //         'name.unique'           => 'Name should be Unique',
        //     ]
        // );

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // } 

        // dd($category);
        // $category->name = $request->input('name');

        // $category->save();

        if($category->save()){
            return redirect('blog/categories/')->with('success', 'Succesfully Edited Category');
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
        $category = Category::findOrFail($id);
        $currentUser = Auth::user();

        if ( $currentUser->isAdmin() ) {
            $category->delete();

            return redirect('blog/categories')->with('success', 'Succesfully deleted category');
        }

        return back()->with('error', 'You are not admin!');
    }
}
