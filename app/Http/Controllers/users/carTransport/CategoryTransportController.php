<?php

namespace App\Http\Controllers\users\carTransport;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryTransportController extends Controller
{

     protected $requestCategory=['category','image','user_id'];
    // This FirstController With Car
       public function index(){
               
        $categories = Category::where('user_id',auth()->user()->id)->get();
       return view('user.carsTransport.category.category',compact('categories'));
       }

    public function addCategory(){
        return view('user.carsTransport.category.categoryAdd');
    }
    public function processAddCategory(Request $request){

        $createCategory = $request->only($this->requestCategory);
        $checknameCategory = Category::where('user_id', '=' , auth()->user()->id)
                                    -> where('category','=',$request->category)->first();

          if($checknameCategory){
            session()->flash('faild', 'اسم هذه الفئة موجود بالفعل');
            return redirect()->back();
          }                          
        $categoryValidate = $request->validate([
            'category'=>'required',
     'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ],[
        'category'=>' اسم الفئة فارغ !',
        'image'=>'  يجب اضافة صورة !',
    
        ]);
         // The File Upload Categories Name is => categories



        
        $img_name = null;
        extract($_FILES['image']);
        if( !empty($name) ){
        $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $extension = strtolower($extension);
        if ( in_array($extension, $extension_arr) ) {
        $img_name = rand(0, 1000) . now() . $name;
        $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
        $createCategory['image'] = $img_name;
        }



        }
        $createCategory['user_id']=auth()->user()->id;
        $insertCategory = Category::create($createCategory);

                    if($insertCategory){
            move_uploaded_file($tmp_name, 'public/images/categories/' . $img_name);
            session()->flash('success','تم اضافة الفئة بنجاح');
            return redirect()->back();
                    }

                   


                



    }
    public function processEditCategory(Request $request){

        $createCategory = $request->only($this->requestCategory);
        $checknameCategory = Category::where('user_id', '=' , auth()->user()->id)
                                    -> where('category','=',$request->category)->first();

          if($checknameCategory){
            session()->flash('faild', 'اسم هذه الفئة موجود بالفعل');
            return redirect()->back();
          }                          
        // $categoryValidate = $request->validate([
        //     'category'=>'required',
        //     'image'=>'required',
        // ],[
        // 'category'=>' اسم الفئة فارغ !',
        // 'image'=>'  يجب اضافة صورة !',
    
        // ]);
         // The File Upload Categories Name is => categories



        
        $img_name = null;
        extract($_FILES['image']);
        if( !empty($name) ){
        $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $extension = strtolower($extension);
        if ( in_array($extension, $extension_arr) ) {
        $img_name = rand(0, 1000) . now() . $name;
        $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
        $createCategory['image'] = $img_name;
        }



        }
        $createCategory['user_id']=auth()->user()->id;
        $insertCategory = Category::where('id',$request->category_id)->update($createCategory);

                    if($insertCategory){
            move_uploaded_file($tmp_name, 'public/images/categories/' . $img_name);
            session()->flash('success','تم تعديل الفئة');
            return redirect()->back();
                    }

                   


                



    }
     public function deleteCategory($id){
        $deletCategory = Category::where('user_id',auth()->user()->id)->where('id',$id)->delete();

        if($deletCategory){
            session()->flash('success', 'تم حذف الفئة بنجاح');
            return redirect()->back();
        }
     }
}
