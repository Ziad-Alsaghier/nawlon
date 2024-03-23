<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Nawlone;
use App\Models\Maintenance;
use App\Models\tax;
use Illuminate\Http\Request;

class ProfitsController extends Controller
{
    // This First Controller With Profit 

    public function index(){
        $nawlons = Nawlone::where('user_id',auth()->user()->id)->get();
      
       
            $maintanences = Maintenance::where('user_id',auth()->user()->id)->get();
                // Total Maintanence
            $totalPriceMaintanence = 0;
        for ($i=0; $i < count($maintanences) ; $i++) {
           $totalPriceMaintanence   += $maintanences[$i]['maintenances_price'];
        }
            $totalNawlonPrice = Nawlone::where('user_id',auth()->user()->id)->sum('nawlone_price');
        $cars = Car::where('user_id', auth()->user()->id)
        ->with('maintenances')
        ->with('nawlon')
        ->with('violations')
        ->get();


        // total Taxes about Car

        $taxses = tax::where('user_id', auth()->user()->id)->sum('total_tex');

        $totalProfit = $totalNawlonPrice - ($taxses + $totalPriceMaintanence );
        $totalProfitPercentage = $totalNawlonPrice / ($taxses + $totalPriceMaintanence ) * 100;


        // 

        // total Nawlon
     
        return view('user.profits.profits',compact('nawlons',
        'cars',
        'totalPriceMaintanence',
        'totalNawlonPrice','taxses', 'totalProfit' ,'totalProfitPercentage'));

    }
}
