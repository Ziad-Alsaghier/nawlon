<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\Divide;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    protected $requestEmployee=[
          'name',
          'divide_employee',
          'phone',
          'id_employee',
          'address',
          'image',
          'image_procedures',
          'salary',
          'divide_id',
          'user_id',
    ];
    // This First Controller With Employee 

        public function index(){
        $divides = Divide::all();
        return view('user.employee.emplyeeAdd',compact('divides'));
        }

            public function addEmployee(Request $request){
                   $request->validate([
                   'name'=>'required',
                   'divide_id'=>'required',
                   'phone'=>'required',
                   'id_employee'=>'required',
                   'address'=>'required',
                   'image'=>'required',
                   'image_procedures'=>'required',
                   'salary'=>'required',
        ]);
        $createNewEmployee=$request->only($this->requestEmployee);
        $img_name = null;
        extract($_FILES['image']);

        if (!empty($name)) {
        $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $extension = strtolower($extension);
        if (in_array($extension, $extension_arr)) {
        $img_name = rand(0, 1000) . now() . $name;
        $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
        $createNewEmployee['image'] = $img_name;
        move_uploaded_file($tmp_name, 'public/images/employees/' . $img_name);
        }


        }


        $image_procedures = null;
        extract($_FILES['image_procedures']);
        if (!empty($name)) {
        $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $extension = strtolower($extension);
        if (in_array($extension, $extension_arr)) {
        $image_procedures = rand(0, 1000) . now() . $name;
        $image_procedures = str_replace([' ', ':', '-'], 'X', $image_procedures);
        $createNewEmployee['image_procedures'] = $image_procedures;
        move_uploaded_file($tmp_name, 'public/images/employees/procedures/' . $image_procedures);

        }


        }
        $createNewEmployee['user_id'] = auth()->user()->id; 
        $addNewEmployee = Employee::create( $createNewEmployee);

        if($addNewEmployee){

        session()->flash('success', 'تم اضافة الموظف بنجاح');
        return redirect()->back();
        }

            }

            public function empolyeeList()
            {
        $employees = Employee::where('user_id',auth()->user()->id)->get();
        $divides = Divide::where('user_id',auth()->user()->id)->get();
        return view('user.employee.employeeList',compact('employees','divides'));

            }
            public function empolyeeUpdate(Request $request)
            {
    //   $request->validate([
    //   'name'=>'required',
    //   'divide_id'=>'required',
    //   'phone'=>'required',
    //   'id_employee'=>'required',
    //   'address'=>'required',
    //   'image'=>'required',
    //   'image_procedures'=>'required',
    //   'salary'=>'required',
    //   ]);
                    // Edit Done put Wee Need Look At Validate
      $createNewEmployee=$request->only($this->requestEmployee);
      $img_name = null;
      extract($_FILES['image']);

      if (!empty($name)) {
      $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
      $extension = explode('.', $name);
      $extension = end($extension);
      $extension = strtolower($extension);
      if (in_array($extension, $extension_arr)) {
      $img_name = rand(0, 1000) . now() . $name;
      $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
      $createNewEmployee['image'] = $img_name;
      move_uploaded_file($tmp_name, 'public/images/employees/' . $img_name);
      }


      }


      $image_procedures = null;
      extract($_FILES['image_procedures']);
      if (!empty($name)) {
      $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
      $extension = explode('.', $name);
      $extension = end($extension);
      $extension = strtolower($extension);
      if (in_array($extension, $extension_arr)) {
      $image_procedures = rand(0, 1000) . now() . $name;
      $image_procedures = str_replace([' ', ':', '-'], 'X', $image_procedures);
      $createNewEmployee['image_procedures'] = $image_procedures;
      move_uploaded_file($tmp_name, 'public/images/employees/procedures/' . $image_procedures);

      }


      }

      $addNewEmployee = Employee::where('id',$request->employee_id)->update( $createNewEmployee);

      if($addNewEmployee){

      session()->flash('success', 'تم تعديل الموظف بنجاح');
      return redirect()->back();
      }

            }


            public function deleteEmployee($id){
        $deleteEmployee = Employee::where('id',$id)->delete();
                    if($deleteEmployee){
            session()->flash('success','تما الغاء الموظف بنجاح');
            return redirect()->back();
                    }
            }
}
