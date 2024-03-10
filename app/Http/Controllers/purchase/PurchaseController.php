<?php

namespace App\Http\Controllers\purchase;

use App\Http\Controllers\Controller;
use App\Models\CarPart;
use App\Models\ProductCategory;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // This First Controller With Purchase Of CarPart
    protected $requestPurchase = [
           'product_category_id',
           'car_part_id',
           'supplier_id',
           'quantity',
           'date',
           'totalPrice',
           'imageInvoice',
           'user_id',
    ]; 
    public function index(){
        $productCategories = ProductCategory::where('user_id',auth()->user()->id)->get();
        $car_parts = CarPart::where('user_id',auth()->user()->id)->get();
        $purchases = Purchase::where('user_id',auth()->user()->id)->get();
        $suppliers = Supplier::where('user_id',auth()->user()->id)->get();
        return view('user.purchase.purchase',compact('purchases','car_parts','productCategories','suppliers'));
    }

    public function addPurchase(Request $request){
       
      
        $request->validate(
              [
                'product_category_id'=>'required',
                'car_part_id'=>'required',
                'supplier_id'=>'required',
                'quantity'=>'required',
                'date'=>'required',
                'totalPrice'=>'required',
                  'imageInvoice' => 'required',
                  'image',
                  'mimes:jpg,png,jpeg,gif,svg',
                  'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                  'max:2048',
              ]
        );
           $requestNewPurchase =$request->only($this->requestPurchase);


           $imageInvoice = null;
           extract($_FILES['imageInvoice']);
           if (!empty($name)) {
           $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
           $extension = explode('.', $name);
           $extension = end($extension);
           $extension = strtolower($extension);
           if (in_array($extension, $extension_arr)) {
           $imageInvoice = rand(0, 1000) . now() . $name;
           $imageInvoice = str_replace([' ', ':', '-'], 'X', $imageInvoice);
            $requestNewPurchase['imageInvoice'] = $imageInvoice;
           move_uploaded_file($tmp_name, 'public/images/purchase/' . $imageInvoice);

           }


           }


          $requestNewPurchase['user_id'] = auth()->user()->id;
        $createPurchases = Purchase::create($requestNewPurchase);
        if($createPurchases){
          
            session()->flash('success','تم عملية الشراء بنجاح');
            return redirect()->back();
        }
    }

     public function editPurchase(Request $request){
     $request->validate(
     [
     'product_category_id'=>'required',
     'car_part_id'=>'required',
     'supplier_id'=>'required',
     'quantity'=>'required',
     'date'=>'required',
     'totalPrice'=>'required',
     ]
     );

     $requestNewPurchase =$request->only($this->requestPurchase);


     $imageInvoice = null;
     extract($_FILES['imageInvoice']);
     if (!empty($name)) {
     $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
     $extension = explode('.', $name);
     $extension = end($extension);
     $extension = strtolower($extension);
     if (in_array($extension, $extension_arr)) {
     $imageInvoice = rand(0, 1000) . now() . $name;
     $imageInvoice = str_replace([' ', ':', '-'], 'X', $imageInvoice);
     $requestNewPurchase['imageInvoice'] = $imageInvoice;
     move_uploaded_file($tmp_name, 'public/images/purchase/' . $imageInvoice);

     }


     }

     $requestNewPurchase['user_id'] = auth()->user()->id;
     $createPurchases =
     Purchase::where('user_id',auth()->user()->id)->where('id',$request->purchase_id)->update($requestNewPurchase);
     if($createPurchases){

     session()->flash('success','تم التعديل  في عملية الشراء بنجاح');
     return redirect()->back();
     }
     }
     

    public function deletePrchase($id){
        $deletePurchase = Purchase::where('user_id',auth()->user()->id)->where('id', $id)->delete();

            if($deletePurchase){
                   session()->flash('success','تم الغاء عملية الشراء بنجاح');
                   return redirect()->back();
            }
    }

            public function purchaseInfo($id){
        $purchases = Purchase::where('id', $id)->with('carPart')->first();

        return view('user.purchase.purchaseInfo',compact('purchases'));
            }
}
