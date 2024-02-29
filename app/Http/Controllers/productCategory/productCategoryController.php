<?php

namespace App\Http\Controllers\productCategory;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class productCategoryController extends Controller
{
    protected $requestProductCategory = [
        'name',
        'product_category_id',
        'user_id',
        'status'
    ];
    // this first Controller With product category Car

            function index(){
        $categories = ProductCategory::where('user_id',auth()->user()->id)->get(); 
        $productCategories = ProductCategory::where('user_id',auth()->user()->id)->get(); 
        return view('user.categoriesProduct.categories',compact('categories'));
            }


            public function addProductCategory(Request $request){

        $newProductCategory = $request->only($this->requestProductCategory);
        $request->validate([
            'name',
        ],[
            'name'=>'يجب كتابة اسم الصنف',
        ]);

                        if(!$request->product_category_id){
                                $newProductCategory['user_id']=auth()->user()->id;
                              $newProductCategory['status']='0';
                              $createNewCategory = ProductCategory::create($newProductCategory);
                        } else{
                                 $newProductCategory['user_id']=auth()->user()->id;
                                 $newProductCategory['status']='1';
                                 $createNewCategory = ProductCategory::create($newProductCategory);
                        }
                          
                   

                        if($createNewCategory){
            session()->flash('success', 'تم اضافة الصنف بنجاح');
            return redirect()->back();
                }

            }
            public function editProductCategory(Request $request){
                

        $newProductCategory = $request->only($this->requestProductCategory);
       

                        if(!$request->product_category_id){
                                $newProductCategory['user_id']=auth()->user()->id;
                              $newProductCategory['status']='0';
                              $createNewCategory =
                              ProductCategory::where('user_id',auth()->user()->id)->where('id',$request->category_id)->update($newProductCategory);
                        } else{
                                 $newProductCategory['user_id']=auth()->user()->id;
                                 $newProductCategory['status']='1';
                                 $createNewCategory =
                                 ProductCategory::where('user_id',auth()->user()->id)->where('id',$request->category_id)->update($newProductCategory);
                        }
                          
                   

                        if($createNewCategory){
            session()->flash('success', 'تم اضافة الصنف بنجاح');
            return redirect()->back();
                }

            }

            function deleteProductCategory($id){
                $checkCategoryDelete = ProductCategory::where('product_category_id', $id)->first();
       if ($checkCategoryDelete ) {
       session()->flash('faild', 'يجب الغاء الاصناف التابعة لهذا الصنف');
       return redirect()->back();
       }
                $deleteCategory = ProductCategory::where('user_id',auth()->user()->id)->where('id',$id)->delete();

                    if($deleteCategory){
            session()->flash('success', 'تم الغاء الصنف ');
            return redirect()->back();
                    }
    }

}
