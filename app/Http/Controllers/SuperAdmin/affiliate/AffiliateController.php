<?php

namespace App\Http\Controllers\SuperAdmin\affiliate;

use App\Models\User;
use App\Models\userAccount;
use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\suberAdmin\AffiliateRequest;

class AffiliateController extends Controller
{
    // This Add Afilliate From SuperAdmin 
    protected $request_affiliate = [
        'name',
        'email',
        'password',
        'phone',
        'position',
        'commission',
        'identity',
        'image',
        'user_id',
        'status',
    ];
    
    public function index(){
        return view('SuperAdmin.affiliate.affiliate');
    }

        

    public function stor_affiliate(AffiliateRequest $request){
                   $afilliateRequest = $this->request_affiliate ; // Get Protected Name Request
                   $newAffiliate = $request->only($afilliateRequest ); // Get Requests To Create New Affiliate
                   $checkUser = User::where('email',$newAffiliate['email'])->first(); // Check User Is Exists or No
                   if($checkUser){
                        session()->flash('faild','This Email Is Exists');
                        return redirect()->back();
                   }
                    if($request->has('image')){// if Request has a Image
            $imagePath = request()->file('image')->store('affiliate','public'); // Take Image from Request And Save in Storage
                    }
        $newAffiliate['image'] = $imagePath; // Image Path
        $newAffiliate['position'] = 'affiliate'; // Image Path
        $newAffiliate['password'] = bcrypt($newAffiliate['password']); // Make Pssword Hashing
        $newAffiliate['user_id'] =auth()->user()->id; // Make Pssword Hashing
        $newAffiliate['status'] ='accepted'; // Make Pssword Hashing
                if($newAffiliate){
            $createAffiliate = User::create($newAffiliate); // Start Create New Affiliate
       
                         if($createAffiliate){
                              $witherd_account_affiliate = userAccount::create([
                              'user_id'=>$createAffiliate->id,
                              'wallet'=> 0,
                              ]);
                               session()->flash('success','Affiliate Add Successfully');
                               return redirect()->back();
                         }
                    }
                }
                

  
 public function list_affiliate(){
                    $userList = User::where('user_id',auth()->user()->id)
                    ->get();
                   
 return view('SuperAdmin.affiliate.list_affiliate',compact('userList'));
 }
}
