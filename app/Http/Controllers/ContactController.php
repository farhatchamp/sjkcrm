<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Contact;
use App\Company;

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


        // dd($request->all());

         $this->validate($request,[
            'title' => ' required',
            'company_id' => 'required',
            'phone_numbers' => 'required',
            'email_address' => 'required',
            'notes' =>'required',

            'name' => ['required', 'string', 'max:255'],
        ]);

          $user = Contact::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
            'title'=> $request->title,
            'phone_numbers'=> $request->phone_numbers,
            'email_address'=> $request->email_address,
            'notes'=> $request->notes,
            // 'password' => Hash::make($data['password']),
            // 'password' => bcrypt($request->password)
        ]);

        // $user->roles()->attach($request->roles);

        Session::flash('success', 'user created');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
