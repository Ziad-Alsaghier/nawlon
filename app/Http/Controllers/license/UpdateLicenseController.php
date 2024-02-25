<?php

namespace App\Http\Controllers\license;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarPart;
use App\Models\Category;
use App\Models\License;
use App\Models\UpdateLicense;

class UpdateLicenseController extends Controller
{
    // This Updated License Car 
    protected $requestUpdateLicense = [
        'user_id',
         'category_id',
         'car_id',
         'license_id',
         'ex_date',
    ];

    public function index(){
        $cars = Car::where('user_id',auth()->user()->id)->with('license')->get();
        $categories = Category::where('user_id',auth()->user()->id)->get();
        $licenseUpdates = UpdateLicense::where('user_id',auth()->user()->id)->get();
        $licenses = License::where('user_id',auth()->user()->id)->get();

        return view('user.license.updat_license',compact('cars','categories','licenses','licenseUpdates'));
    }
    



    public function updateOldLicense(Request $request){
        $request->validate(
       [      
        'category_id' =>'required',
        'car_id'      =>'required',
        'license_id' =>'required',
        'ex_date'     =>'required',
       ],[
        'car_part_id'=>'يجب اختيار الفئة',
        'car_id'=>'يجب اختيار السيارة',
        'license_id'=>'يجب اختيار  الرخصة',
        'ex_date'=>'يجب كتابة تارخ انتهاء الرخصة',
       ]
        );
        $updateOldLicense =$request->only($this->requestUpdateLicense);
        $updateOldLicense['user_id'] = auth()->user()->id;
        $createNewUpdate = UpdateLicense::create($updateOldLicense);
        if($createNewUpdate){
            $oldLicense = License::where('id',$request->license_id)->update(['ex_date'=>$request->ex_date]);
            
            session()->flash('success', 'تم تجديد الرخصة بنجاح');
            return redirect()->back();
        }
    }
    public function updateLicenseOld(Request $request){
       
        $updateOldLicense =$request->only($this->requestUpdateLicense);
        $updateOldLicense['user_id'] = auth()->user()->id;
        $createNewUpdate = UpdateLicense::where('id',$request->License_id)->update($updateOldLicense);
        if($createNewUpdate){
            $oldLicense = License::where('id',$request->license_id)->update(['ex_date'=>$request->ex_date]);
            
            session()->flash('success', 'تم نعديل الرخصة بنجاح');
            return redirect()->back();
        }
    }




            public function deleLicenseUpdate($id){


                $deleteLicense = UpdateLicense::where('user_id',auth()->user()->id)->
                where('id',$id)->delete();

                if($deleteLicense){
            session()->flash('success');
            return redirect()->back();
                }
            }

                    public function filterCar(Request $request){
                        $car = Car::where('category_id', $request->category_id)->get();
                         return response()->json(['success'=>'data return successfully','car'=>$car]);
                    }
}
