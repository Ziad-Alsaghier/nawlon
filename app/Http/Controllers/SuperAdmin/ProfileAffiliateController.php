<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\userAccount;
use Illuminate\Http\Request;

class ProfileAffiliateController extends Controller
{
    // This All Information About Affiliate Profile

    public function index(int $id){
        $affiliate = User::where('id', $id)->first(); 
        return view('SuperAdmin.affiliate.profile',compact('affiliate'));
    }


    public function statusUpdate($id,$type){
        $customer_update = User::where('id',$id)->update(['status'=>$type]);
        if($customer_update){
            session()->flash('success', 'Customer Updated Successfully');
            return redirect()->back();
        }
    }
}
