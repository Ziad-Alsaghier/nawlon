<?php

namespace App\Http\Controllers\reportNawlon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportNawlonController extends Controller
{
    // This First Report With Nawlon 


        public function index(){
        return view('user.reportNawlon.reportNawlon');
        }
}
