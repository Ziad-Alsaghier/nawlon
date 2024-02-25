<?php

namespace App\Http\Controllers\users\driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{

        protected $driver= [
              'driv_name',
              'id_number',
              'salary',
              'comsium',
              'image',
              'image_procedures',
              'image_license',
              'license',
              'ex_date',
              'address',
              'phone',
              'user_id',
        ];
     
    // This First Controller With Driver 


        public function index (){
        return view('user.driver.driverAdd');
        }


    public function addDriver(Request $request)
    {

       $requestDriver = $request->validate([
               'driv_name'=>'required',
               'id_number'=>'required',
               'salary'=>'required',
               'comsium'=>'required',
               'image'=>'required',
               'image_procedures'=>'required',
               'image_license'=>'required',
               'license'=>'required',
               'ex_date'=>'required',
               'address'=>'required',
               'phone'=>'required',
        ],[
             'driv_name|required'=>'يجب ادخال بيانات في هذا الحقل',
             'id_number|required'=>'يجب ادخال بيانات في هذا الحقل',
             'salary|required'=>'يجب ادخال بيانات في هذا الحقل',
             'comsium|required'=>'يجب ادخال بيانات في هذا الحقل',
             'image|required'=>'يجب ادخال بيانات في هذا الحقل',
             'image_procedures|required'=>'يجب ادخال بيانات في هذا الحقل',
             'image_license|required'=>'يجب ادخال بيانات في هذا الحقل',
             'license|required'=>'يجب ادخال بيانات في هذا الحقل',
             'ex_date|required'=>'يجب ادخال بيانات في هذا الحقل',
             'address|required'=>'يجب ادخال بيانات في هذا الحقل',
        ]);


        $img_name = null;
        extract($_FILES['image']);

        if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                    $requestDriver['image'] = $img_name;
                        move_uploaded_file($tmp_name, 'public/images/driver/' . $img_name);
            }

            
        }

            // image procedures

          $image_procedures = null;
          extract($_FILES['image_procedures']);
          if (!empty($name)) {
          $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
          $extension = explode('.', $name);
          $extension = end($extension);
          $extension = strtolower($extension);
          if (in_array($extension, $extension_arr)) {
          $image_procedures = rand(0, 1000) . now() . $name;
          $image_procedures = str_replace([' ', ':', '-'], 'X', $image_procedures);
          $requestDriver['image_procedures'] = $image_procedures;
                        move_uploaded_file($tmp_name, 'public/images/driver/procedures/' . $image_procedures);

          }


          }
          

// image license
            $image_license = null;
        
            extract($_FILES['image_license']);
            if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
            $image_license = rand(0, 1000) . now() . $name;
            $image_license = str_replace([' ', ':', '-'], 'X', $image_license);
            $requestDriver['image_license'] = $image_license;
            $requestDriver['user_id'] = auth()->user()->id;

            }

            }
        $insertDriver = Driver::create($requestDriver);
                        move_uploaded_file($tmp_name, 'public/images/driver/license/' . $image_license);

        if($insertDriver){

            session()->flash('success', 'تم اضافة سائق بنجاح');
            return redirect()->back();
        }

    }
       
    public function driverList(){
        $drivers = Driver::where('user_id',auth()->user()->id)->get();
        return view('user.driver.driverList',compact('drivers'));
    }

    public function deleteDriver(int $id){
        $deletDriver = Driver::where('id', $id)->delete();

        if($deletDriver){
            session()->flash('success','تم حذف السائق بنجاح');
            return redirect()->back();
        }
    }


    function editDriver(Request $request){
           $requestDriver = $request->only([
           'driv_name',
           'id_number',
           'salary',
           'comsium',
           'image',
           'image_procedures',
           'image_license',
           'license',
           'ex_date',
           'address',
           'id_phone',
           'phone',
           ]);

            $img_name = null;
            extract($_FILES['image']);

            if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
            $img_name = rand(0, 1000) . now() . $name;
            $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
            $requestDriver['image'] = $img_name;
            move_uploaded_file($tmp_name, 'public/images/driver/' . $img_name);
            }


            }

            // image procedures

            $image_procedures = null;
            extract($_FILES['image_procedures']);
            if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
            $image_procedures = rand(0, 1000) . now() . $name;
            $image_procedures = str_replace([' ', ':', '-'], 'X', $image_procedures);
            $requestDriver['image_procedures'] = $image_procedures;
            move_uploaded_file($tmp_name, 'public/images/driver/procedures/' . $image_procedures);

            }


            }


            // image license
            $image_license = null;

            extract($_FILES['image_license']);
            if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
            $image_license = rand(0, 1000) . now() . $name;
            $image_license = str_replace([' ', ':', '-'], 'X', $image_license);
            $requestDriver['image_license'] = $image_license;

            }

            }
                $updateDriver = Driver::where('id',$request->driver_id)->update($requestDriver);
               move_uploaded_file($tmp_name, 'public/images/driver/license/' . $image_license);

               if($updateDriver){

               session()->flash('success', 'تم اضافة سائق بنجاح');
               return redirect()->back();
               }


    }
}
