<?php

namespace App\Http\Controllers;

use App\Gallary;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gallaries=Gallary::all();
            
        return view('admins.gallaries.index')->with('gallaries', $gallaries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.gallaries.create');
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
            'name'=>'required|min:5',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=570,height=400',
        ]
    );

    if ($validator->fails()) {

        $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }
   
    //
   
     $gallary_image=$request->file('image');
     $file_name=time().$gallary_image->getClientOriginalName();
     $dest_path='app_images/gallaries';
     $gallary_image->move($dest_path,$file_name);

      Gallary::create([
      'image'=> $dest_path."/".$file_name,
      'name'=>$request->name,
     
      ]);

    


      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function show(Gallary $gallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $gallary=Gallary::findOrfail($id);

        return view('admins.gallaries.edit')->with('gallary',$gallary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $gallary=Gallary::findOrfail($id);

        $validator = \Validator::make($request->all(),
        [
            'name'=>'required|min:5',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=570,height=400',
        ]
    );

    if ($validator->fails()) {

       // $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }

    
      $gallary_image=$request->file('image');
      if($gallary_image){
        
         if($gallary){
             unlink($gallary->image);
         }
         
         $file_name=time().$gallary_image->getClientOriginalName();
         $dest_path='app_images/gallaries';
         $gallary_image->move($dest_path,$file_name);

         $gallary->image= $dest_path."/".$file_name;
         $gallary->name=$request->name;
         $gallary->save();
      }else{
        $gallary->name=$request->name;
        $gallary->save();
      }


      return redirect()->back()->with('gallary',$gallary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallary $gallary)
    {
        //
        unlink($gallary->image);
        $gallary->delete();

        return redirect()->back();
    }
}
