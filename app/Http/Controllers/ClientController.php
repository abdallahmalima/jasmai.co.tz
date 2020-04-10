<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=Client::all();
            
        return view('admins.clients.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.clients.create');
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
            'name'=>'required|min:1',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=310,height=120',
        ]
    );

    if ($validator->fails()) {

        $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }
   
    //
   
     $client_image=$request->file('image');
     $file_name=time().$client_image->getClientOriginalName();
     $dest_path='app_images/clients';
     $client_image->move($dest_path,$file_name);

      Client::create([
      'image'=> $dest_path."/".$file_name,
      'name'=>$request->name,
     
      ]);

    


      return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $client=Client::findOrfail($id);

        return view('admins.clients.edit')->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $client=Client::findOrfail($id);

        $validator = \Validator::make($request->all(),
        [
            'name'=>'required|min:1',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=310,height=120',
        ]
    );

    if ($validator->fails()) {

       // $request->flash();
        return redirect()->back()->with('errors',$validator->errors());
    }

    
      $client_image=$request->file('image');
      if($client_image){
        
         if($client){
             unlink($client->image);
         }
         
         $file_name=time().$client_image->getClientOriginalName();
         $dest_path='app_images/clients';
         $client_image->move($dest_path,$file_name);

         $client->image= $dest_path."/".$file_name;
         $client->name=$request->name;
         $client->save();
      }else{
        $client->name=$request->name;
        $client->save();
      }


      return redirect()->back()->with('client',$client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        unlink($client->image);
        $client->delete();

        return redirect()->back();
    }
}
