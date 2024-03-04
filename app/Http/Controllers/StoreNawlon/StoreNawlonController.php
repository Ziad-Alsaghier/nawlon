<?php

namespace App\Http\Controllers\StoreNawlon;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class StoreNawlonController extends Controller
{
    // Tis First Controller With nawlon Store 
    public function index()
    {
        $purchases = Purchase::where('user_id',auth()->user()->id)->get()->unique('car_part_id');
        return view('user.nawlonStore.nawlonStore',compact('purchases'));
    }
}
