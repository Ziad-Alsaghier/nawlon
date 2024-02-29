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
        $user = $request->user();
                        // ===========This data Count About Pinding Nawlon===============================

        $nawlonesPending = Nawlone::where('user_id',$user_id)
                            ->where('status','0')
                            ->get();
                        // ===========This data Count About Pinding Nawlon===============================


                        // ===========This data Count About Done Nawlon===============================

        $nawlonesDone = Nawlone::where('user_id',$user_id)
                            ->where('status','1')->get();
                        // ===========This data Count About Done Nawlon===============================


                        // ===========This data Details About Pinding Nawlon===============================
                            $detailsPinding = Nawlone::where('user_id', $user_id)
            ->where('status', '0')
            ->whith('car')
            ->get();  
                        // ============This data Details About Pinding Nawlon==============================


                        // ============This data Details About Done Nawlon==============================

        $detailsDone = Nawlone::where('user_id', $user_id)
            ->where('status', '1')
            ->whith('car')
            ->get();
                        // ============This data Details About Done Nawlon==============================

                            if($user){// if user Authantcated Return This Data 
            return response()->json([
                'success'=>'Data Returned Successfuly',
                                ['nawlonesPending'=>count($nawlonesPending),'status'=>'0'],
                                ['nawlonesDone'=>count($nawlonesDone),'status'=>'1'],
                                ['detailsPinding'=>$detailsPinding,'status'=>'0'],
                                ['detailsDone'=>$detailsDone,'status'=>'0'],
            ]);
                            }else{ // Else Return Faild
            return response()->json(['faild' => 'You Not Authantcated']);
                            }
            }


}
