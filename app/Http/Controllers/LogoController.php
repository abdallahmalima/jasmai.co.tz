<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Http\Request;


class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $logo=self::createLogoObject();

        return view('admins.logo.edit')->with('logo',$logo);
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
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        
       /* $this->validate($request,[
         'logo_text'=>'required',
         'logo'=>'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=250,height=500',
        ]);*/

        $logo=self::createLogoObject();

        $validator = \Validator::make($request->all(),
		    [
                'logo_text'=>'required|min:10',
                'logo'=>'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=200,height=45',
		    ]
		);

		if ($validator->fails()) {

            
            return redirect()->back()->with('logo',$logo)->with('errors',$validator->errors());
		}
       
        //
       
      $logo_image=$request->file('logo');
      if($logo_image){
        
         if($logo){
             if(Logo::all()->count()>0){
                unlink($logo->logo);
             }
            
         }
         
         $file_name=time().$logo_image->getClientOriginalName();
         $dest_path='app_images/logo';
         $logo_image->move($dest_path,$file_name);

         $logo->logo= $dest_path."/".$file_name;
         $logo->logo_text=$request->logo_text;
         $logo->save();
      }else{
        $logo->logo_text=$request->logo_text;
        $logo->save();
      }


      return redirect()->back()->with('logo',$logo);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
    }

    public static function createLogoObject(){
        $logo=Logo::first();

        if(!$logo){
            $logo=new Logo();
        }

        return $logo;

    }
}
