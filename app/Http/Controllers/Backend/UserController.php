<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('Backend.viewuser');
    }
    
    public function openregisterUser(){
        return view('Backend.register');
    }
    public function registerUser(Request $request){

        $name  = $request->name;
        $email = $request->email;
        $password= $request->password;
        $profile = $request->profile;

        if($profile){
            $profileName = rand(1,99999).'-'.$profile->getClientOriginalName();
            $profile  ->move('profiles',$profileName);
        }  
            User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
                'profile'=>$profileName
            ]);
            return redirect()->route('login')->with('Add User Success','');
    }

    public function openLogin(){
        return view('Backend.login');
    }

    public function login(Request $request){
        

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/dashboard')->with('login success','');
        }
        else if(Auth::attempt(['name'=>$request->email,'password'=>$request->password])){
            return redirect('/dashboard')->with('login success','');
        }
        else{
            return redirect()->route('login')->with('login not success','');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
