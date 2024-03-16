<?php

namespace App\Http\Controllers\api;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\driverFollow;
use App\Models\Employee;
use App\Models\Maintenance;
use App\Models\Nawlone;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class NawlonApiController extends Controller
{
        // This First Api With Controller 

        // Start Get Cars Transporter

        public function carTransport(Request $request)
        {
                $user_id = $request->user()->id;

                if (Auth::check()) {
                        $carBusy = Car::where('user_id', $user_id)->where('status', '0')->get();
                        $carAvailable = Car::where('user_id', $user_id)->where('status', '1')->get();
                        $carInRoad = Car::where('user_id', $user_id)->where('status', '2')->get();
                        $carUnAvailable = Car::where('user_id', $user_id)->onlyTrashed()->get();
                        return response()->json([
                                'success' => 'Data Return Successfuly',

                                ['carBusy' => count($carBusy), 'status' => '0'],
                                ['carAvailable' => count($carAvailable), 'status' => '1'],
                                ['carInRoad' => count($carInRoad), 'status' => '2'],
                                ['carUnAvailable' => count($carUnAvailable), 'status' => '3'],

                        ]);
                }


        }



        public function nawlones(Request $request)
        {

                if (Auth::check()) {
                        $user_id = $request->user()->id;
                        $user = $request->user();
                        // ===========This data Count About Pinding Nawlon===============================

                        $nawlonesPending = Nawlone::where('user_id', $user_id)
                                ->where('status', '0')
                                ->get();
                        // ===========This data Count About Pinding Nawlon===============================


                        // ===========This data Count About Done Nawlon===============================

                        $nawlonesDone = Nawlone::where('user_id', $user_id)
                                ->where('status', '1')->get();
                        // ===========This data Count About Done Nawlon===============================


                        // ===========This data Details About Pinding Nawlon===============================
                        $detailsPinding = Nawlone::where('user_id', $user_id)
                                ->where('status', '0')
                                ->with('car')
                                ->get();
                        // ============This data Details About Pinding Nawlon==============================


                        // ============This data Details About Done Nawlon==============================

                        $detailsDone = Nawlone::where('user_id', $user_id)
                                ->where('status', '1')
                                ->with('car')
                                ->get();
                        // ============This data Details About Done Nawlon==============================

                        if ($user) {// if user Authantcated Return This Data
                                return response()->json([
                                        'success' => 'Data Returned Successfuly',

                                        ['nawlonesPending' => count($nawlonesPending), 'status' => '0'],
                                        ['nawlonesDone' => count($nawlonesDone), 'status' => '1'],
                                        ['detailsPinding' => $detailsPinding, 'status' => '0'],
                                        ['detailsDone' => $detailsDone, 'status' => '0'],
                                ]);
                        } else { // Else Return Faild
                                return response()->json(['faild' => 'You Not Authantcated']);
                        }
                }
        }
        public function workerData(Request $request)
        {
                if (Auth::check()) {
                        // Start Get Data Driver
                        $driverAvailable = Driver::where('user_id', $request->user()->id)->where('status', '1')->count();
                        $driverUnAvailable = Driver::where('user_id', $request->user()->id)->where('status', '0')->count();
                        // Start Get Data Driver

                        // Start Get Data Follow Driver
                        $driverFollowAvailable = driverFollow::where('user_id', $request->user()->id)->where('status', '1')->count();
                        $driverFollowUnAvailable = driverFollow::where('user_id', $request->user()->id)->where('status', '0')->count();
                        // Start Get Data Follow Driver

                        // Start Get Data Follow Driver
                        $employeeAvailable = Employee::where('user_id', $request->user()->id)->where('status', '1')->count();
                        $employeeUnAvailable = Employee::where('user_id', $request->user()->id)->where('status', '0')->count();
                        // Start Get Data Follow Driver
                        return response()->json([
                                'success' => 'Data Return Successfully',
                                //This Driver Available & un Available
                                [
                                        ['driverAvillable' => $driverAvailable, 'statusAvaillable' => '1',],
                                        ['driverUnAvailable' => $driverUnAvailable, 'statusUnAvaillable' => '0',],
                                ],
                                //This Follow Driver Available & un Available
                                [
                                        ['driverFollowAvailable' => $driverFollowAvailable, 'statusAvaillable' => '1'],
                                        ['driverFollowUnAvailable' => $driverFollowUnAvailable, 'statusUnAvaillable' => '0'],
                                ],
                                [
                                        ['employeeAvailable' => $employeeAvailable, 'statusAvaillable' => '1'],
                                        ['employeeUnAvailable' => $employeeUnAvailable, 'statusUnAvaillable' => '0'],
                                ]
                        ], 200);
                }
        }


        public function storeNawlon(Request $request)
        {
                $user_id = $request->user()->id;
                if (Auth::check()) { // Return Nawlon Store For Application 
                        $storeNawlone =
                                Purchase::where('user_id', auth()->user()->id)->with('carPart')->get();

                        return response()->json([
                                'success' => 'Data Returned Successfuly',
                                ['storeNawlon' => $storeNawlone]

                        ], 200);

                }
        }




        public function maintanenceApi(Request $request)
        {
                if (Auth::check()) {
                        // Start Get Data About mintanence With Car  
                        $maintainence = Maintenance::where('user_id', $request->user()->id)
                                ->with('car')->with('sevicesMaintanenc')
                                ->with('car_parts')
                                ->with('sevicesMaintanenc')
                                ->get();
                                // Start Return response data Of /_____Maintanence______\
                        return response()->json([
                                'success' => 'Welcom To Nawlon for Maintanence',
                               'maintanence' => $maintainence,
                        ]);
                }
        }

}
