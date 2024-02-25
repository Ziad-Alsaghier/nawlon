<?php

namespace App\Http\Controllers\expenses;

use App\Http\Controllers\Controller;
use App\Models\CategoryExpense;
use App\Models\Expense;
use Illuminate\Http\Request;

class CategoryExpenseController extends Controller
{
    // this first Controller With Expenses
    protected $reqCateyExpenses = [
              'name',
              'user_id',
    ]; 
        public function index()
        {
         $categories = CategoryExpense::where('user_id', auth()->user()->id)->get();

        return view('user.expenses.categoryExpenses',compact('categories'));
        }

        public function store(Request $request)
        {
       $newCategory = $request->only($this->reqCateyExpenses);
        $request->validate([
                'name',
        ],[
            'name'=>'يجب كتابة الصنف',
        ]);
        $newCategory['user_id'] = auth()->user()->id;
        $createCategoryExpenses = CategoryExpense::create($newCategory);
        if($createCategoryExpenses )
        {
            session()->flash('success', 'تما اضافة الصنف بنجاح');
            return redirect()->back();

        }
        }
        public function editCategory(Request $request)
        {

       $newCategory = $request->only($this->reqCateyExpenses);
        $request->validate([
                'name',
        ],[
            'name'=>'يجب كتابة الصنف',
        ]);
        $newCategory['user_id'] = auth()->user()->id;
        $createCategoryExpenses = CategoryExpense::where('id',$request->category_id)->update($newCategory);
        if($createCategoryExpenses )
        {
            session()->flash('success', 'تما اضافة الصنف بنجاح');
            return redirect()->back();

        }
        }

        public function deleteCategory($id){
        $deleteCategoryExpenses = CategoryExpense::where('id',$id)->delete();
        if($deleteCategoryExpenses){
            session()->flash('success','تم حذف الصنف بنجاح');
            return redirect()->back();
        }
        }
}
