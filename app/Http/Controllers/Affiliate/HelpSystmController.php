<?php

namespace App\Http\Controllers\affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpSystmController extends Controller
{
    // Help Affiliate To Used This System

    public function index (){
        return view('affiliate.help');
    }

    public function help_video($type){
        return view('affiliate.help_video',compact('type'));
    }
}
