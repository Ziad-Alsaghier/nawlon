<?php

namespace App\Http\Controllers\license;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\License;
use Illuminate\Http\Request;

class LicenceController extends Controller
{
 // This First Controller With License
          protected $requestUpdateLicense= ['license_number','image','car_id','user_id','ex_date'];
 public function index(){
        $cars = Car::where('user_id',auth()->user()->id)->get();
 return view('user.license.license',compact('cars'));
 }
 public function addLicense(Request $request){

         $createNewLicense = $request->only($this->requestUpdateLicense);
       $license = $request->validate([
            'license_number'=>'required',
            'ex_date'=>'required',
            'car_id'=>'required',
        ],[
            'license_number'=>'يجب كتابة رقم الرخصة',
            'ex_date'=>'يجب كتابة انتهاء موعد الرخصة',
        ]); // Validate Input
        // Check License Is Exists Or No 
                        $image_procedures = null;
                        extract($_FILES['image']);
                if (!empty($name)) {
                        $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                        $extension = explode('.', $name);
                        $extension = end($extension);
                        $extension = strtolower($extension);
                        if (in_array($extension, $extension_arr)) {
                                $image_procedures = rand(0, 1000) . now() . $name;
                                $image_procedures = str_replace([' ', ':', '-'], 'X', $image_procedures);
                                $createNewLicense['image'] = $image_procedures;
                                move_uploaded_file($tmp_name, 'public/images/license/' . $image_procedures);

                        }
                }// End Download 

        $checkLicense = License::where(['license_number'=> $request->license_number,])->first();


             $ceckCarLicense = License::where(['car_id'=> $request->car_id,])->first();
             if($ceckCarLicense){
                    session()->flash('faild', 'هذه السيارة لديها رخصة ');
                    return redirect()->back();
             }
       if($checkLicense){
            session()->flash('faild', 'هذه الرخصة موجودة بالفعل');
            return redirect()->back(); 
     

       }else{
               $createNewLicense['user_id'] = auth()->user()->id;
            $newLicense = License::create($createNewLicense);
            if($newLicense){
                    session()->flash('success','تم اضافة رخصة جديدة للسيارة');
                    return redirect()->back();
            }
       }
 }
                         public function updateLicense(Request $request){
          $dataOfLicense = $request->only($this->requestUpdateLicense); // This Take The Request From This PropertyrequestUpdateLicense requestUpdateLicense
          $updateLicense = License::where('id',$request->license_id)->update($dataOfLicense);
              
                    session()->flash('success', 'تم التعديل بنجاح');
                    return redirect()->back();
                         }

                         

        public function listLicense(){
$cars = car::where('user_id',auth()->user()->id)->get();
        $licenses = License::where('user_id',auth()->user()->id)->get();
        return view('user.license.listLicense',compact('licenses','cars'));
        }
        public function deleteLicense($id){

        $licenses = License::where('id',$id)->delete();
        session()->flash('success', 'License Deleted Successfully');
        return redirect()->back();
        }
}
