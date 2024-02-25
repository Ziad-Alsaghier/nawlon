<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Analytics extends Controller
{
 
  public function index()
  {
    return view('SuperAdmin.dashboards-analytics');
  }

 
}
