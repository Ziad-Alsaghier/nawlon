<?php

namespace App\Http\Controllers;

use App\Models\Nawlone;
use Illuminate\Http\Request;

class ProfitsController extends Controller
{
    // This First Controller With Profit 

    public function index(){
        $nawlons = Nawlone::where('id',auth()->user()->id)->get();
            $total = 0 ;    
        for ($i=0; $i <count($nawlons) ; $i++) {
            $totalNawlon= +$nawlons[$i]['nawlone_price'];
            }
        return view('user.profits.profits',compact('nawlons','totalNawlon'));

    }
}
