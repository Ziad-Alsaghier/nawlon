<?php

namespace App\Http\Controllers\supAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSupAdminController extends Controller
{
    // This First Controller With sup Admin Manager Can Make Roles for Sup Admin
    
    
    public function index(){
        return view('user.subAdmin.subAdmin');
    }
}
