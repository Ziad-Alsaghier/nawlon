<?php

namespace App\Http\Controllers\supAdmin;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSupAdminController extends Controller
{
    // This First Controller With sup Admin Manager Can Make Roles for Sup Admin
    protected $requestUserAdmin = [
        'name',
        'email',
        'phone',
        'parent_phone',
        'password',
        'role_car',
        'role_nawlon',
        'role_empoloyee',
        'user_id',
        'image',
        'status',
        'package_id',
    ];

    public function index()
    {
        $subAdmins = User::where('user_id', auth()->user()->id)
                        ->where('user_id','!=',Null)
                        ->with('roles')->
                        get();
        return view('user.subAdmin.subAdmin',compact('subAdmins'));
    }


    public function store_role_user(Request $request)
    {
        $checkUser = User::where('email', $request->email)
               ->where('user_id',auth()->user()->id)
            ->first();

        if ($checkUser) {
            session()->flash('faild', 'هذا العامل موجود بالفعل');
            return redirect()->back();
        }
        $addNewUserAdmin  = $request->only($this->requestUserAdmin);
        $imageUser = null;

        extract($_FILES['image']);
        if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
                $imageUser = rand(0, 1000) . now() . $name;
                $imageUser = str_replace([' ', ':', '-'], 'X', $imageUser);
                $addNewUserAdmin['image'] = $imageUser;
                move_uploaded_file($tmp_name, 'public/images/customer/' . $imageUser);
            }
        }
        $allRoles = [];
            if($request->role_nawlon){

                $allRoles[] =$addNewUserAdmin['role_nawlon'] ?? Null;
            }if($request->role_car){

                $allRoles[]=$addNewUserAdmin['role_car'] ?? Null;
            }if($request->role_empoloyee){

                $allRoles[]=$addNewUserAdmin['role_empoloyee'] ?? Null;
            }
        // array About Add Ruls     
        $addNewUserAdmin['position'] = 'userAdmin';
        $addNewUserAdmin['package_id'] = auth()->user()->package->id;
        $addNewUserAdmin['password'] = bcrypt($request->password);
        $addNewUserAdmin['user_id'] = auth()->user()->id; 
        $addNewUserAdmin['status'] = 'accepted'; 
            // Create New User Admin
        $newUserAdmin = User::where('user_id', auth()->user()->id)->create($addNewUserAdmin);
        $subAdmin_id = $newUserAdmin->id;
            // Create Roles This User Admin

        for ($i=0; $i < count($allRoles); $i++) {
            $newRoles = RoleUser::where('user_id', auth()->user()->id)->create([
                'user_id'=>$subAdmin_id,
                 'role_name'=>$allRoles[$i]
            ]);
         }

        if($newUserAdmin){
            session()->flash('success','تم اضافة العامل بنجاح');
            return redirect()->back();
        }
    }
        public function deleteRole($id){ // Delete Roles User Admin 
        $deleteRole = RoleUser::where('id', $id)->delete();
                    if($deleteRole){
            session()->flash('success', "تم حذف  بنجاح");
            return redirect()->back();
                    }
        }    

        public function deleteUserAdmin($id){
        $deleteUserAdmin = User::where('user_id','!=',Null)
                                ->where('id',$id)
                                ->delete();
            if ($deleteUserAdmin) {
            session()->flash('success','تم الغاء العامل بنجاح');
            return redirect()->back();
            }
        }


}
