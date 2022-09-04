<?php

namespace App\Http\Controllers;
    use App\Http\Requests\UserRequest;
use Session;
use Hash;
use Illuminate\Http\Request;
use App\user;
class customAuthC extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registeruser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data= new user();
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->password = Hash($request->get('password'));
        $res=$data->save();
        if($res){
            return back()->with('success','You have registered');
        }else{
            return back()->with('fail','Something Wrong');
        }
    }

    public function loginuser(Request $request)
    {
        $request->validate([
           'email' => 'required',
            'password' => 'required',
        ]);
        $data=user::where('email','=',$request->get('email'))->first();
        if($data){
            if(Hash::check($request->get('password'),$data->password)){
                $request->session()->put('loginid',$data->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','Password Not match');
            }
        }else{
            return back()->with('fail','This email is not registered');

        }
    }
    public function dashboard(){
        $data=array();
        if(session::has('loginid')){
            $data=user::where('id','=',session::get('loginid'))->first();
        }
        return view('auth.dashboard',compact('data'));
    }

    public function logout()
    { if(session::has('loginid')){
        session::pull('loginid');
        return redirect('login');
    }

    }
}
