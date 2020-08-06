<?php

namespace App\Http\Controllers;

use App\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the inputs
        $request->validate([
            'email' =>'required',
            'password' =>'required',
        ]);

        //log in the user 
        //store the email and the password in a variable
        $cre= $request->only('email','password');
        //check if the user dosn't exsit in the data base using guard
        if(!Auth::guard('admin')->attempt($cre)){
            return back()->withErrors([
                'message' => 'your email or password are wrong',
            ]);
        }else{
            //redirect the user 
              return redirect()->route('dash')->with('mess','you are logedin');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
