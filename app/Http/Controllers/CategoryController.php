<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all();
            
        return view('admins.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = \Validator::make($request->all(),
        [
            'title'=>'required|min:10',
            'description'=>'required|min:10',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=64,height=64',
        ]
    );

    if ($validator->fails()) {

        $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }
   
    //
   
     $category_image=$request->file('image');
     $file_name=time().$category_image->getClientOriginalName();
     $dest_path='app_images/categories';
     $category_image->move($dest_path,$file_name);

      Category::create([
      'image'=> $dest_path."/".$file_name,
      'title'=>$request->title,
      'description'=>$request->description
      ]);

    


      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category=Category::findOrfail($id);

        return view('admins.categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $category=Category::findOrfail($id);

        $validator = \Validator::make($request->all(),
        [
            'title'=>'required|min:10',
            'description'=>'required|min:10',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=64,height=64',
        ]
    );

    if ($validator->fails()) {

       // $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }

    
      $category_image=$request->file('image');
      if($category_image){
        
         if($category){
             unlink($category->image);
         }
         
         $file_name=time().$category_image->getClientOriginalName();
         $dest_path='app_images/categories';
         $category_image->move($dest_path,$file_name);

         $category->image= $dest_path."/".$file_name;
         $category->title=$request->title;
         $category->description=$request->description;
         $category->save();
      }else{
        $category->title=$request->title;
        $category->description=$request->description;
        $category->save();
      }


      return redirect()->back()->with('category',$category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        
        unlink($category->image);
        $category->delete();

        return redirect()->back();
    }
}
