<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // this first Controller With Nawlon Api
    protected $requestData = [
            'email',
            'password',
    ];
            public function login(Request $request){
        $credetionals =$request->only($this->requestData);

        $checkData = Auth::attempt($credetionals);

                    if(!$checkData){
                        return response()->json(['faild'=> 'Data Rejected ']);
                    }else{
                        $userData = User::where('email',$request->email)->first();
            $token = $userData->createToken('personal access tokens')->plainTextToken;
             $userData->token = $token;

                        return response()->json([
                            'success'=> 'Data Posted Successfully',
                            'user'=>$userData,
                            'token' => $token,
                        ],200);

                    }
            }



            public function logout( Request  $request){
                                $user = $request->user();
                                if(empty($user)){
                                    // if User Dont Have Any Token
                        return response()->json(['faild'=>'You Not Authantecated',419]);
                        }else {
                            // If User Have token Deleted This Token
                            $deleteToken = $user->tokens()->delete();
                            if($deleteToken){
                                 return response()->json(['success'=>'You Logout Successfully'],200);
                            }
                    }
                    
            }
}
