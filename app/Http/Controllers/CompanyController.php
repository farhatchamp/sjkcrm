<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Company;
use App\Contact;
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

    public function CompanyListWindow(Request $request)
    {
        //

        return view('admin.companies.CompanyListWindow')
        ->with('companies', Company::all())
        ->with('contacts' , Contact::all());
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

            'name' => ['required', 'string', 'max:255'],
            'user_id' => ['required'],
        ]);

    	  $company = Company::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);


        Session::flash('success', 'Company created');
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
         $company = Company::find($id);
         $contacts = Contact::where('company_id' , '=' , $id)->get();
         // die($contact);
        return view('admin.companies.show')
        ->with('company', $company)
        ->with('contacts', $contacts);
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

         $company = Company::find($id);
        return view('admin.companies.edit')->with('company', $company)
                                            ->with('roles' , Role::with('users')->where('name', 'company')->get()); 
        ;

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

           $this->validate($request,[
            // 'name' => ' required',
            // 'email' =>'required|email',

         
            'name' => ['required', 'string', 'max:255'],
            'user_id' => ['required'],
        ]);
        $company = Company::find($id);
        // $user = User::update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //      // 'password' => Hash::make($data['password']),
        //      'password' => bcrypt($request->password)
        // ]);

        $company->name = $request->name;
        $company->user_id = $request->user_id;
        // $user->name = $request->name;
        $company->save();

        Session::flash('success', 'Company Updated Successfully');
        return redirect()->route('companies');
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

        $company = Company::find($id);
        $company->delete();
        Session::flash('success' , 'Company Deleted');

        return redirect()->route('companies');
    }

     public function activate($id)
        {
            //

            $company = Company::find($id);
            $company->active = 1;
            $company->save();

            Session::flash('success' , 'Company Activated Successfully');

            return redirect()->back(); 
        }


     public function deactivate($id)
        {
            //

            $company = Company::find($id);
            $company->active = 0;
            $company->save();


            Session::flash('success' , 'Company deactivated Successfully');

            return redirect()->back(); 
        }

}
