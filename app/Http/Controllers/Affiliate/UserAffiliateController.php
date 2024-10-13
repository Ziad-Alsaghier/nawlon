<?php

namespace App\Http\Controllers\Affiliate;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAffiliateController extends Controller
{
    // This Is All Logical About Affiliate 


    public function index(){
    
        return view('Affiliate.affiliate');
    }

      public function affiliate_signUp(){
      // Start Make SignUp
      return view('affiliate.affiliate-signUp');

      }
}
