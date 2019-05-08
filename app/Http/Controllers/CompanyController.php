<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Company;
use App\User;
use App\Role;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        //

        return view('admin.companies.index')
        ->with('companies', Company::paginate(5))
        ->with('users' , User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.companies.create')->with('roles' , Role::with('users')->where('name', 'company')->get());
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
            // 'name' => ' required',
            // 'email' =>'required|email',

            'name' => ['required', 'string', 'max:255'],
            'user_id' => ['required'],
        ]);

    	  $user = Company::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            // 'password' => Hash::make($data['password']),
            // 'password' => bcrypt($request->password)
        ]);

        // $user->roles()->attach($request->roles);

        Session::flash('success', 'user created');
        return redirect()->route('companies');
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
