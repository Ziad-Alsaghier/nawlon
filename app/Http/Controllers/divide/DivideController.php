<?php

namespace App\Http\Controllers\divide;

use App\Models\Divide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivideController extends Controller
{

    protected $requestDvide = ['name','user_id'];
    // This First Controller Wiht partations of Employee
    public function index(){
        $divides = Divide::where('user_id',auth()->user()->id)->get();
        return view('user.divide.divideAdd',compact('divides'));
    }  

    public function divideAdd(Request $request ){
        $addRequestDivide = $request->only($this->requestDvide);
        $request->validate([
            'name'=>'required',
        ],[
            'name'=>'يجب كتابة اسم القسم '
        ]);
        $addRequestDivide['employee_id'] = '1';
        $addRequestDivide['user_id'] = auth()->user()->id;
        $createDivide = Divide::create($addRequestDivide);
        if ($createDivide){
            session()->flash('success', 'تم اضافة القسم');
            return redirect()->back();

        }
    }
      public function editDivide(Request $request ){
        $divideNew=$request->only($this->requestDvide);
      
        $divideRequest['employee_id'] = '1';
        $createDivide = Divide::where('id',$request->divide_id)->update($divideNew);
        if ($createDivide){
        session()->flash('success', 'تم تعديل القسم');
        return redirect()->back();

        }
      }
    public function deletDivide( $id ){

        $deletDivide = Divide::where('id', $id)->delete();
     if ($deletDivide){
     session()->flash('success', 'تم حذف القسم');
     return redirect()->back();

     }
    }
  
}
