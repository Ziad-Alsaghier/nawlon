<?php

namespace App\Http\Controllers\login;

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $loginRequest = ['email', 'password'];
    // This First Controller Wiht Login
           
            public function login (){
        return view('login.auth');
                
            }


            public function checkLogin(Request $request){
                 $request->validate([
                 'email'=>'required',
                 'password'=>'required',
                 ]);
        $cradetional = $request->only($this->loginRequest);

        
        $user = User::where('email', $request->email)->first();
         
                    if(!$user){
            session()->flash('faild','Email or Password Wrong');
            return redirect()->back();
                    }else{
            if(Auth::attempt($cradetional)){
                               
                        if($user->position == 'customer' or $user->position == 'userAdmin'){
                                
                                return redirect()->route('dashboard')->with(['success'=>'تم التسجيل بنجاح']);
                        }elseif($user->position == 'superAdmin'){
                                
                                return redirect()->route('dashboard-analytics')->with(['success'=>'تم التسجيل بنجاح']);
                        }

                                }else{
                                        session()->flash('faild','Password Wrong');
                                                return redirect()->back();
                                }
                    }  
                   
         
            }
            

                public function logout(request $request){

      $request->session()->regenerateToken();
      $request->session()->invalidate();

      return redirect()->route('login');
                }
}
