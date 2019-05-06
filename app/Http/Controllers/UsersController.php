<?php

namespace App\Http\Controllers;
use Session;
use App\User;
//use App\Imports\UsersImport;
//use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //


        return view('admin.users.index')->with('users', User::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
        $this->validate($request,[
            // 'name' => ' required',
            // 'email' =>'required|email',

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($data['password']),
            'password' => bcrypt($request->password)
        ]);

        Session::flash('success', 'user created');
        return redirect()->route('users');
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
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $user = User::find($id);
        // $user = User::update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //      // 'password' => Hash::make($data['password']),
        //      'password' => bcrypt($request->password)
        // ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->name = $request->name;
        $user->save();

        Session::flash('success', 'User Updated Successfully');
        return redirect()->route('users');
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

        $user = User::find($id);
        $user->delete();
        Session::flash('success' , 'User Deleted');

        return redirect()->route('users');
    }

    public function importUser(){

        return view('admin.users.import-user');

    }

    public function handleImportUser(Request $request){
        // $validator = validator::make($request->all(),[
        //     'file' => 'required',
        // ]);
        // if($validator->false()){
        //     return
        // }
        $this->validate($request,[
            // 'name' => ' required',
            // 'email' =>'required|email',

            'file' => 'required',
        ]);

        Excel::import(new UsersImport,request()->file('file'));


        // $file = $request->file('file');
        // $csvData = file_get_contents($file);
        // $rows = array_map('str_getcsv', explode("\n", $csvData));
        // $header = array_shift($rows);
        // foreach ($rows as $row ) {
        //     $row = array_combine($header, $row);

        //     // $row['user_id'] = $request->part_id;
        //      // 'user_id' => $request->user_id,
        //      // User::create($row);

        //     User::create([
        //          // 'id' => $request->id,
        //          'name' => $row['name'],
        //          'email' => $row['email'],
        //          'password' => bcrypt(uniqid()),
        //          'admin' => 0,
        //      ]);

        // }
        Session::flash('success' , 'CSV Imported Successfully');
        return redirect()->back();

        // dd($rows);

    }

    public function activate($id)
    {
        //

        $user = User::find($id);
        $user->active = 1;
        $user->save();

        Session::flash('success' , 'User Activated Successfully');

        return redirect()->back();
    }


    public function deactivate($id)
    {
        //

        $user = User::find($id);
        $user->active = 0;
        $user->save();

        Session::flash('success' , 'User deactivated Successfully');

        return redirect()->back();
    }

    public function admin($id)
    {
        //

        $user = User::find($id);
        $user->admin = 1;
        $user->save();

        Session::flash('success' , 'User Updated Successfully');

        return redirect()->back();
    }

    public function not_admin($id)
    {
        //

        $user = User::find($id);
        $user->admin = 0;
        $user->save();

        Session::flash('success' , 'User Updated Successfully');

        return redirect()->back();
    }

}
