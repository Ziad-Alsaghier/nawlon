<?php

namespace App\Http\Controllers\insurance;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    // This first controller With Insurance 
        protected $requestInsurance = [
                 'car_id',
                 'total_insurance',
                 'user_id',
                 'date',
        ];
            public function index(){
        $insurances = Insurance::where('user_id',auth()->user()->id)->get();
        $cars = Car::where('user_id',auth()->user()->id)->get();
        $categories = Category::where('user_id',auth()->user()->id)->get();
        return view('user.insurance.insurance',compact('insurances','categories','cars'));
            }



            public function store(Request $request)
            {
        $newInsurance = $request->only($this->requestInsurance);
                    $request->validate([
                            'car_id',
                            'total_insurance',
                            'user_id',
                            'date',
                    ]);
        $newInsurance['user_id'] = auth()->user()->id;
        $createInsurance = Insurance::create($newInsurance);
                        if($createInsurance){
            session()->flash('success', 'تم اضافة التأمين بنجاح');
            return redirect()->back();
                        }

            }


            public function editInsurance(Request $request){
                  $newInsurance = $request->only($this->requestInsurance);
                        
                   $newInsurance['user_id'] = auth()->user()->id;
                   $createInsurance = Insurance::where('id',$request->insurance_id)->update($newInsurance);
                   if($createInsurance){
                   session()->flash('success', 'تم اضافة التأمين بنجاح');
                   return redirect()->back();
                   }
            }

            public function deleteInsurance($id){
        $deleteInsurance = Insurance::where('id', $id)->delete();
                    if ($deleteInsurance) {
            session()->flash('success','تم الغاء التأمين بنجاح');
            return redirect()->back();
                    }
            }
}
