<?php

namespace App\Http\Controllers\revenues;

use App\Http\Controllers\Controller;
use App\Models\CategoryRevenues;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //This first Controller With Category Revenue
   protected $reqCateyRevenue = [
   'name',
   'user_id',
   ];
    public function index()
    {
        $categories = CategoryRevenues::where('user_id',auth()->user()->id)->get();
        return view('user.revenue.category',compact('categories'));
    }

        public function store(Request $request)
        {
        $newCategory = $request->only($this->reqCateyRevenue);
        $request->validate([
        'name',
        ],[
        'name'=>'يجب كتابة الصنف',
        ]);
        $newCategory['user_id'] = auth()->user()->id;
        $createCategoryRevenue = CategoryRevenues::create($newCategory);
        if($createCategoryRevenue )
        {
        session()->flash('success', 'تما اضافة الصنف بنجاح');
        return redirect()->back();

        }
        }
        public function editCategoryRevinue(Request $request)
        {

        $newCategory = $request->only($this->reqCateyRevenue);
        $request->validate([
        'name',
        ],[
        'name'=>'يجب كتابة الصنف',
        ]);
        $newCategory['user_id'] = auth()->user()->id;
        $createCategoryRevenue = CategoryRevenues::where('id',$request->category_id)->update($newCategory);
        if($createCategoryRevenue )
        {
        session()->flash('success', 'تم تعديل الصنف بنجاح');
        return redirect()->back();

        }
        }

        public function deleteCategoryRevinue($id){
        $deleteCategoryRevenue = CategoryRevenues::where('id',$id)->delete();
        if($deleteCategoryRevenue){
        session()->flash('success','تم حذف الصنف بنجاح');
        return redirect()->back();
        }
        }
}
