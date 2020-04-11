<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $headers=Header::all();
            
        return view('admins.headers.index')->with('headers', $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('admins.headers.create');
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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=1900,height=600',
        ]
    );

    if ($validator->fails()) {

        $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }
   
    //
   
     $header_image=$request->file('image');
     $file_name=time().$header_image->getClientOriginalName();
     $dest_path='app_images/headers';
     $header_image->move($dest_path,$file_name);

      Header::create([
      'image'=> $dest_path."/".$file_name,
      'title'=>$request->title,
      'description'=>$request->description
      ]);

    


      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $header=Header::findOrfail($id);

        return view('admins.headers.edit')->with('header',$header);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $header=Header::findOrfail($id);

        $validator = \Validator::make($request->all(),
        [
            'title'=>'required|min:10',
            'description'=>'required|min:10',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=1900,height=600',
        ]
    );

    if ($validator->fails()) {

       // $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }

    
      $header_image=$request->file('image');
      if($header_image){
        
         if($header){
             unlink($header->image);
         }
         
         $file_name=time().$header_image->getClientOriginalName();
         $dest_path='app_images/headers';
         $header_image->move($dest_path,$file_name);

         $header->image= $dest_path."/".$file_name;
         $header->title=$request->title;
         $header->description=$request->description;
         $header->save();
      }else{
        $header->title=$request->title;
         $header->description=$request->description;
        $header->save();
      }


      return redirect()->back()->with('header',$header);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
        //
        unlink($header->image);
        $header->delete();

        return redirect()->back();
    }
}
