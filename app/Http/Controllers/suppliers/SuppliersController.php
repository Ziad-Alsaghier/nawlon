<?php

namespace App\Http\Controllers\suppliers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    protected $postsSuppliers = [
        'name',
        'phone',
        'address',
        'product',
        'user_id',
    ];
    // This First Controller With Suppliers
            public function index()
            {
        return view('user.supplier.supplierAdd');
            }

            public function store(Request $request){
        $requestSupplier =$request->validate(
            ['name'=>'required','phone'=>'required','address'=>'required',],[
                'name'=>'يجب ادخال اسم المورد',
                'phone'=>'يجب ادخال رقم المورد',
                'address'=>'يجب ادخال عنوان المورد',
            ]
        );
        $createNewSupplier =$request->only($this->postsSuppliers);
       
        $checkNameSupplier = Supplier::where('name', $request->name)->first();
                if(!$checkNameSupplier){
                     $createNewSupplier['user_id']=auth()->user()->id;
                    $newSupplier = Supplier::create($createNewSupplier);
                    session()->flash('success','تم اضافة مورد جديد');
                    return redirect()->back();
                }
            }



                    public function supplierList(){
        $supllires = Supplier::where('user_id',auth()->user()->id)->get();
                            return view('user.supplier.listSupplier',compact('supllires'));
                    }

                    public function supplierUpdate(Request $request){
        $requestSupplier = $request->only($this->postsSuppliers);
        $requestSupplier =$request->validate(
                        ['name'=>'required','phone'=>'required','address'=>'required',],[
                        'name'=>'يجب ادخال اسم المورد',
                        'phone'=>'يجب ادخال رقم المورد',
                        'address'=>'يجب ادخال عنوان المورد',
                        ]
                        );

                     
        $updateSupplier = Supplier::where('id', $request->supplier_id)->update($requestSupplier);

                            if($updateSupplier){
                                session()->flash('success','تم التعديل بنجاح');
                                return redirect()->back();
                            }   
                        

                    }



                    public function deleteSupplier(int $id){

        $deleteSupplier = Supplier::where('id',$id)->delete();

        session()->flash('success','تم خذف المورد بنجاح');
        return redirect()->back();
                    }










}
