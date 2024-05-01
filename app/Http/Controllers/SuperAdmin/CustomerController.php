<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
    use App\Models\Package;
    use App\Models\User;
class CustomerController extends Controller
{
    // This first Controller With Customer 

    public function index()
    {   
            // $requestNewCustomer= [];
                $package = Package::all();
            return view('SuperAdmin.customer.customerAdd',compact('package'));



    }
    
            public function addCustomer(Request $request){
   
                 // Start Create New Customer 
                   $newCustomer = $request->validate([
                        'name'=>'required',
                        'email'=>'required',
                        'phone'=>'required',
                        'package'=>'required',
                        'parent_phone'=>'required',
                        'password'=>'required',
                        'logoImage'=>'required',
                        'image'=>'required',
                    ]);

                    $img_name = null;
                     extract($_FILES['logoImage']);
                    if (!empty($name)) {
                    $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                    $extension = explode('.', $name);
                    $extension = end($extension);
                    $extension = strtolower($extension);
                    if (in_array($extension, $extension_arr)) {
                    $img_name = rand(0, 1000) . now() . $name;
                    $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                    $newCustomer['logoImage'] = $img_name;
                    move_uploaded_file($tmp_name, 'public/images/customer/' . $img_name);
                    }
                    }

                    $imageUser = null;

                    extract($_FILES['image']);
                    if (!empty($name)) {
                    $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                    $extension = explode('.', $name);
                    $extension = end($extension);
                    $extension = strtolower($extension);
                    if (in_array($extension, $extension_arr)) {
                    $imageUser = rand(0, 1000) . now() . $name;
                    $imageUser = str_replace([' ', ':', '-'], 'X', $imageUser);
                    $newCustomer['image'] = $imageUser;
                  move_uploaded_file($tmp_name, 'public/images/customer/' . $img_name);
                }
                    }
                                $checkEmail = User::where('email',$request->email)->first();
                                if($checkEmail){
                                    session()->flash('faild','This Email Already Exists');
                                    return redirect()->back();
                                }else{
                                    $newCustomer['package_id']=$request->package;
                                $newCustomer['password']=bcrypt($request->password);
                                   $createNewCustomer= User::create( $newCustomer );
                                   if($createNewCustomer){

                                            session()->flash('success','Customer Add Successfully');
                                            return redirect()->back();
                                   }
            return $request->all();
                                }
                                    
                           
            }


            public function getDataCustomer(){

                    $userList = User::all();
                   
                        return view('SuperAdmin.customer.customerList',compact('userList'));
            }
}
