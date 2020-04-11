<?php

namespace App\Http\Controllers;

use App\Work;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $works=Work::all();
            
        return view('admins.works.index')->with('works', $works);
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
        $sub_categories=SubCategory::all();

        return view('admins.works.create')->with('categories', $categories)->with('sub_categories', $sub_categories);
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
            'category_id'=>'required|exists:categories,id',
            'sub_category_id'=>'required|exists:sub_categories,id',
            'title'=>'required|min:10',
            'description'=>'required|min:10',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=900,height=632',
        ]
    );

    if ($validator->fails()) {

        $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }
   
    //
   
     $work_image=$request->file('image');
     $file_name=time().$work_image->getClientOriginalName();
     $dest_path='app_images/works';
     $work_image->move($dest_path,$file_name);

      Work::create([
      'category_id'=>$request->category_id,
      'sub_category_id'=>$request->sub_category_id,    
      'image'=> $dest_path."/".$file_name,
      'title'=>$request->title,
      'description'=>$request->description
      ]);

    


      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $work=Work::findOrfail($id);

        return view('admins.works.edit')->with('work',$work);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $work=Work::findOrfail($id);

        $validator = \Validator::make($request->all(),
        [
            'category_id'=>'required|exists:categories,id',
            'sub_category_id'=>'required|exists:sub_categories,id',
            'title'=>'required|min:10',
            'description'=>'required|min:10',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=900,height=632',
        ]
    );

    if ($validator->fails()) {

       // $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }

    
      $work_image=$request->file('image');
      if($work_image){
        
         if($work){
             unlink($work->image);
         }
         
         $file_name=time().$work_image->getClientOriginalName();
         $dest_path='app_images/works';
         $work_image->move($dest_path,$file_name);

         $work->category_id=$request->category_id;
         $work->sub_category_id=$request->sub_category_id;
         $work->image= $dest_path."/".$file_name;
         $work->title=$request->title;
         $work->description=$request->description;
         $work->save();
      }else{
        $work->category_id=$request->category_id;
        $work->sub_category_id=$request->sub_category_id;   
        $work->title=$request->title;
        $work->description=$request->description;
        $work->save();
      }


      return redirect()->back()->with('work',$work);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //

        unlink($work->image);
        $work->delete();

        return redirect()->back();
    }
}
