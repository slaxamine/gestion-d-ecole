<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Hash;
use Crypt;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;






// use Illuminate\Support\Facades;

class AuthController extends Controller
{

    // public function list(){

    //     $users = User::all();
    //     $data = ['Js' =>'Users'];
    //     return view('tables.users' ,compact('users'),$data);
    // }
    public function index()
    {
         
        return view('login');
    
    }
    public function registration()
    {
         // if(Auth::check()){
        return view('registration');
        // }
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email= $request->input("email") ;
        $password =$request->input("password");
        
         if (User::where('email','=',$email)->exists()) {
            $pass = crypt::decrypt(User::where('email','=',$email)->get()->makeVisible('password')->pluck('password'));
            if ($password =$pass) {
                session(['user_id' => User::get('id'), 'user_name' =>User::get('name') ]);
                return redirect()->intended('/users');
            }
            
            
        }
       
        return redirect("/")->withErrors('Oppes! You have entered invalid credentials');

    }
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'nom' => 'required',
            'lastname' => 'required',
            'tel' => 'required',
            'datedebut' => 'required',
            'datN' => 'required',
            'genre' => 'required',
            'niveau' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        User::insert([
            'name' => $request->input('nom'),
            'lastname' => $request->input('lastname'),
            'tel' => $request->input('nom'),
            'datedebut' => $request->input('datedebut') ,               
            'datN' => $request->input('datN'),
            'genre' => $request->input('genre'),
            'niveau' => $request->input('niveau'),
            'email' => $request->input('email'),
            'password' =>crypt::encrypt($request->input('password')),
        ]);
        
         
        return redirect("/")->withSuccess('Great! You have Successfully registered');
    }
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    public function create()
    {
   echo Hash::make('123456');
    }

     
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
