<?php

namespace App\Http\Controllers\SuperAdmin\affiliate;

use App\Http\Controllers\Controller;
use App\Models\userAccount;
use App\Models\UserAccountProcess;
use Illuminate\Http\Request;

class UserAccountProcessController extends Controller
{
    // This All Process Account About Affiliate From Admin

    Public function accept_money(int $id, string $account_id,string $type,string $process_type){
                
        $account_user = userAccount::where('id',$account_id)->first();
        $account_user_process = UserAccountProcess::where('id',$id)->first();
        if ($process_type == 'withdraw'){
            $totalWallt = $account_user->wallet - $account_user_process->money ;
        }else{
        $totalWallt = $account_user->wallet +$account_user_process->money ;
        }
         $account_user_process->update(['status'=>$type]);
         if($type == 'accepted'){
               $account_user->update(['wallet'=>$totalWallt]);
         }
            $type == 'accepted' ? session()->flash('success','payment Accepted '): session()->flash('success','payment Rejected ');
        return redirect()->back();
        }
}
