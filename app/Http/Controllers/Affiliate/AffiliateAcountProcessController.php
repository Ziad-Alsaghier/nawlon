<?php

namespace App\Http\Controllers\Affiliate;

use ErrorException;
use App\Models\userAccount;
use Illuminate\Http\Request;
use App\Models\UserAccountProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\accountProcess\AccountProcessRequest;

class AffiliateAcountProcessController extends Controller
{
    // This Is All Acount Process About Affiliate
    protected $requestAccountPrcess = [
        'money',
        'process_type',
        'user_accounts_id',
        'process_type'
    ];
    public function index(){
        return view('Affiliate.payout');
    }

    public function withdraw_mony(AccountProcessRequest $request){
        $payout = $request->only($this->requestAccountPrcess);
            if($payout < 0 ){
            session()->flash('faild','This Amount Less Than Zero');
                return redirect()->back();
            }
            try{
       $wallet_affiliate = userAccount::where('user_id',auth()->user()->id)->first();
       $user_accounts_id = UserAccountProcess::where('user_accounts_id',$wallet_affiliate->id)
        ->where('process_type','withdraw')
        ->where('status','pending')
       ->first();
                $wallet = $wallet_affiliate->wallet ;
                    $accounts_id = $wallet_affiliate->id;
                    if(isset($user_accounts_id)){
                           $process_limet = $user_accounts_id->sum('money');
                    $user_accounts_id = $wallet_affiliate->id;
                              if($process_limet >= $wallet){
                  session()->flash('faild','You have reached your maximum withdrawal limit');
                  return redirect()->back();
             }
                    }
            
            }catch(ErrorException ){
            session()->flash('faild','Your Account Stagnated ');
            return redirect()->back();
            }
             if($wallet < $payout['money']){
                        session()->flash('faild','This Amount Mor Than Your Wallet');
                        return redirect()->back();
                    }else{
                $payout['user_accounts_id'] = $accounts_id;
                $payout['process_type'] = 'withdraw';
                    $request_payout = UserAccountProcess::create( $payout);
                        if($request_payout){
                    session()->flash('success','The pull task has been sent to the administrator for acceptance');
                    return redirect()->back();
                        }
                    }
    }
    // public function deposit_Account(){

    // }
}
