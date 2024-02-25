<?php

namespace App\Http\Controllers\users\driverFollow;

use App\Http\Controllers\Controller;
use App\Models\driverFollow;
use Illuminate\Http\Request;

class DriverFollowController extends Controller
{
    //  this first controller With Driver Follow 
    protected $requestFollowDrriver  = [
         'name',
         'id_follow',
         'image',
         'image_procedures',
         'salary',
         'address',
         'phone',
         'user_id',
    ];
public function index(){
        return view('user.driver_follow.driverFolloAdd');
}

public function addDriverFollow(Request $request){


        $request->validate([
                   'name'=>'required',
                   'id_follow'=>'required',
                   'salary'=>'required',
                   'image'=>'required',
                   'image_procedures'=>'required',
                   'address'=>'required',
                   'phone'=>'required',
        ],[
                'name'=>'يجب كتابة الاسم',
                'id_follow'=>'يجب كتابة البطاقة الخاصة بالتباع',
                'salary'=>'يجب كتابة مرتب التباع',
                'image'=>'يجب ادخال صورة البطاقة',
                'image_procedures'=>'يجب ادخال صورة الفيش',
                'address'=>'يجب كتابة عنوان التباع',
                'phone'=>'يجب كتابة الهاتف',
        ]);
        $createFollowDriver = $request->only($this->requestFollowDrriver);

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
   $createFollowDriver['image'] = $img_name;
   move_uploaded_file($tmp_name, 'public/images/driverFollow/' . $img_name);
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
          $createFollowDriver['image_procedures'] = $image_procedures;
          move_uploaded_file($tmp_name, 'public/images/driverFollow/procedures/' . $image_procedures);

          }


          }
                $createFollowDriver['user_id'] = auth()->user()->id;
                $addNewDriverFollow = driverFollow::create( $createFollowDriver);

                if($addNewDriverFollow){
                    
                session()->flash('success', 'تما اضافة تباع جديد');
                return redirect()->back();
                }
        

}       




public function editDriverFollow(Request $request){



$updateRequest = $request->only($this->requestFollowDrriver);

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
$updateRequest['image'] = $img_name;
move_uploaded_file($tmp_name, 'public/images/driverFollow/' . $img_name);
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
$updateRequest['image_procedures'] = $image_procedures;
move_uploaded_file($tmp_name, 'public/images/driverFollow/procedures/' . $image_procedures);
    
}


}
      
$updateDriverFollow = driverFollow::where('id',$request->drivFollow_id)->update($updateRequest );

if($updateDriverFollow){

session()->flash('success', 'تما تعديل تباع جديد');
return redirect()->back();
}


}








public function editFollowDriver(){

        $driverFollows = driverFollow::all();
        return view('user.driver_follow.driverFollowList',compact('driverFollows'));
            } 
            public function deletedriverFollow($id){

        $driverFollows = driverFollow::where('id',$id)->delete();
                        if ($driverFollows) {
 session()->flash('success', 'تم حذف التباع بنجاح');
 return redirect()->back(); }
            } 
}
