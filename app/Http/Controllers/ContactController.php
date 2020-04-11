<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        $contact=self::createContactObject();
        
        return view('admins.contacts.edit')->with('contact',$contact);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
         
        $contact=self::createContactObject();

        $validator = \Validator::make($request->all(),
		    [
                'description'=>'required|min:10',
                'address'=>'required|min:3',
                'email'=>'required|email',
                'phone1'=>'required|min:10|numeric|min:10',
                'phone2'=>'required|min:10|numeric|min:10',
		    ]
		);

		if ($validator->fails()) {

            
            return redirect()->back()->with('contact',$contact)->with('errors',$validator->errors());
		}
       
        //
       
      
        $contact->description=$request->description;
        $contact->address=$request->address;
        $contact->email=$request->email;
        $contact->phone1=$request->phone1;
        $contact->phone2=$request->phone2;
        $contact->save();
      


      return redirect()->back()->with('contact',$contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public static function createContactObject(){
        $contact=Contact::first();

        if(!$contact){
            $contact=new Contact();
        }

        return $contact;

    }
}
