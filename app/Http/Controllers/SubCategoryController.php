<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sub_categories=SubCategory::all();
            
        return view('admins.sub_categories.index')->with('sub_categories', $sub_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        return view('admins.sub_categories.create')->with('categories',$categories);
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
            'title'=>'required|min:1|unique:sub_categories',
            'category_id'=>'required|exists:categories,id',
            
        ]
    );

    if ($validator->fails()) {

        $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }
   
    //
   
     

      SubCategory::create([
      'title'=>$request->title,
      'category_id'=>$request->category_id,
      ]);

    


      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $sub_category)
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
        $categories=Category::all();
        $sub_category=SubCategory::findOrfail($id);

        return view('admins.sub_categories.edit')->with('sub_category',$sub_category)->with('categories',$categories);
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

        $sub_category=SubCategory::findOrfail($id);

        $validator = \Validator::make($request->all(),
        [
            'title'=>'required|min:1',
            'category_id'=>'required|exists:categories,id',
        ]
    );

    if ($validator->fails()) {

       // $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }

    
     
        
        $sub_category->title=$request->title;
        $sub_category->category_id=$request->category_id;
        $sub_category->save();
      


      return redirect()->back()->with('sub_category',$sub_category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {

        
       
        $sub_category->delete();

        return redirect()->back();
    }
}
