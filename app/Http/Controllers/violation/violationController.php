<?php

namespace App\Http\Controllers\violation;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Driver;
use App\Models\ViolationCar;
use App\Models\ViolationDriver;
use Illuminate\Http\Request;

class violationController extends Controller
{
    // This First Controller With violation Elmo5alfat
    protected $requestViolations = [
             'violations',
             'type',
             'violation_number',
             'violation_price',
             'violation_date',
             'car',
             'driver',
             'user_id',
    ];
        public function index (){
                // withTrashed() Where We Get Car With deleted_at
            $cars = Car::where('user_id',auth()->user()->id)->where('deleted_at',Null)->orderBy('cars_name', 'ASC')->get();
            $drivers = Driver::orderBy('driv_name', 'ASC')->get();
 
        return view('user.violation.violationAdd',compact('cars','drivers'));
        }

        public function proccessViolationAdd(Request $request)
        {
         $dataViolation= $request->only($this->requestViolations);


                    if($request->car){
                                // If The Violation With Car 
                                 $vaiolationCheck = ViolationCar::where('violation_number', $request->violation_number)->first();

                                if($vaiolationCheck){
                                      session()->flash('faild', 'رقم المخالفة موجود بالفعل');
                                      return redirect()->back();
                                }
                        $dataViolation['car_id'] = $request->car_id;
              $dataViolation['user_id'] = auth()->user()->id;
                         $addVaiolation = ViolationCar::create($dataViolation);
          
                    }
                    if($request->driver){
                        // If Violation With Driver 
             $dataViolation['driver_id'] = $request->driver_id;;
             $dataViolation['user_id'] = auth()->user()->id;
                $addVaiolation = ViolationDriver::create($dataViolation);
                    }   
                    if( $addVaiolation ){
        session()->flash('success', 'تم اضافة المخالفة بنجاح');
        return redirect()->back();
                    }

                       

        }

        public function violationList()
        {

        $cars = Car::where('user_id',auth()->user()->id)->orderBy('cars_name', 'ASC')->get();
        $carVaiolations = ViolationCar::all();
        $driverVaiolations = ViolationDriver::all();
              
        return view('user.violation.violationList',compact('carVaiolations','cars','driverVaiolations'));
        }


       

        public function deleteVaiolation($id,$type){
         $id . $type;
                if($type == 'car'){
            $deleteViolationCar = ViolationCar::where('id',$id)->delete(); 
                
                }else{
                       $deleteViolationDriver = ViolationDriver::where('id',$id)->delete();
                }
        session()->flash('success','تم الغاء المخالفة');
        return redirect()->back();
        }

        public function editViolationCar(Request $request){


      $requestViolation =  $request->only($this->requestViolations);
                if($request->violation_price <= 0){
            session()->flash('faild', 'لا يمكن ادخال هذه القيمة');
            return redirect()->back();
                }
                    if($request->type_edit == 'car'){
            $updateViolation = ViolationCar::where('id', $request->violation_id)->update($requestViolation);
                                if($updateViolation){
                session()->flash('success','تم التعديل في المخالفة');
                return redirect()->back();
                                }
                    }else{
                           $updateDriveViolation = ViolationDriver::where('id',
                           $request->violationDrive_id)->update($requestViolation);
                                if ($updateDriveViolation) {
                                    session()->flash('success', 'تم التعديل في المخالفة');
                                    return redirect()->back();
                                }
                    }

                   

        }
}
