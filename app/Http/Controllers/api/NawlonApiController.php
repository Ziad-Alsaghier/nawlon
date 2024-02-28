<?php

namespace App\Http\Controllers\api;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nawlone;
use Illuminate\Support\Facades\Auth;

class NawlonApiController extends Controller
{
    // This First Api With Controller 

            // Start Get Cars Transporter

            public function carTransport(Request $request ){
        $user_id = $request->user()->id;

                        if(Auth::check()){
   $carBusy = Car::where('user_id',$user_id)->where('status','0')->get();
   $carAvailable = Car::where('user_id',$user_id)->where('status','1')->get();
   $carInRoad = Car::where('user_id',$user_id)->where('status','2')->get();
   $carUnAvailable= Car::where('user_id',$user_id)->onlyTrashed()->get();
   return response()->json([
   'success'=> 'Data Return Successfuly',
        'cars'=>[
               ['carBusy'=>count($carBusy),'status'=>'0'],
               ['carAvailable'=>count($carAvailable),'status'=>'1'],
               ['carInRoad'=>count($carInRoad),'status'=>'2'],
               ['carUnAvailable'=>count($carUnAvailable),'status'=>'3'],
        ]
   ]);
                        }
     
                    
            }



            public function nawlones(Request $request){

        $user_id =$request->user()->id;
        $nawlones = Nawlone::where('user_id',$user_id)
                            ->where('status','0');
            }
}
