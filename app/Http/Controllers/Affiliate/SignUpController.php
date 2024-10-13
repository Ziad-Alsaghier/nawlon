<?php

namespace App\Http\Controllers\Affiliate;

use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\signUp\SignUpRequest;
use App\Models\accountProcess;
use App\Models\AccountProcess as ModelsAccountProcess;
use App\Models\userAccount;
use App\Models\UserAccountProcess;

class SignUpController extends Controller
{
    // This Is Controller About All SignUp New Campany

        protected $request_signUp = [
           "name",
           "email",
           "phone",
           "parent_phone",
           "password",
           "package_id",
           "logoImage",
           "image",
        ]; 
    public function index(){
        $packages = Package::get();
        return view('Affiliate.sign-up',compact('packages'));
    }

    public function store_signUp(SignUpRequest $request){
         $commission = auth()->user()->commission;
         $user_id = auth()->user()->id;
         $signUp = $request->only($this->request_signUp);
          $package = Package::where('id',$signUp['package_id'])->first();
       $commissionAffiliate =  $package->setup_fees * $commission / 100 ;
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
                    $signUp['logoImage'] = $img_name;
                    move_uploaded_file($tmp_name, 'public/images/campany/' . $img_name);
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
                    $signUp['image'] = $imageUser;
                  move_uploaded_file($tmp_name, 'public/images/customer/' . $img_name);
                }
                    }
                    $checkEmail = User::where('email',$signUp['email'])->first();
                    if($checkEmail){
                             session()->flash('faild','This Email Already Exists');
                             return redirect()->back();
                    }else{
            $wallet = userAccount::where('user_id', $user_id)->first();
                    // Add Commition  
        if($wallet){
                $user = User::where('id', auth()->user()->id)->first();
            $witherd_account_affiliate = UserAccountProcess::create([
            'user_accounts_id'=>$wallet->id,
            'money'=>$commissionAffiliate,
            'process_type'=>'sale',
            'status'=>'pending',
            ]);
        }
                                 $signUp['password']= bcrypt($signUp['password']);
                                 $signUp['status']= 'pending';
                                 $signUp['user_id']= $user_id;
                                 $createsignUp= User::create( $signUp );
                                 if($createsignUp){
                                        session()->flash('success','Customer Add Successfully');
                                        return redirect()->back();
                                 }
                    }
        
    }
    
}
