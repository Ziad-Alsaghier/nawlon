<?php

namespace App\Http\Controllers\expenses;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\CategoryExpense;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    // This first Controller With Expenses
    protected $reqCateyExpenses = [
      'name',
      'category_expenses_id',
      'total_price',
      'date',
      'user_id',
     ];
    public function index()
    {
         $categoryExpenses = CategoryExpense::where('user_id', auth()->user()->id)->get();
         $expenses = Expense::where('user_id', auth()->user()->id)->get();
        return view('user.expenses.expenses',compact('expenses','categoryExpenses'));
    }

 
    

     public function store(Request $request)
     {

     $newExpenses = $request->only($this->reqCateyExpenses);
     $request->validate([
 
            'name'=>'required',
            'category_expenses_id'=>'required',
            'total_price'=>'required',
            'date'=>'required',
     ],[
     'name'=>'يجب كتابة الصنف',
     'category_expenses_id'=>'يجب اختيار الصنف',
     'total_price'=>'يجب كتابة السعر',
     'date'=>'يجب كتابة الوقت',
     ]);
     $checkExenses = Expense::where('user_id', auth()->user()->id)->
     where('name',$request->name)->first();
     if($checkExenses){
     session()->flash('faild', 'هذا الأسم موجود بالفعل');
     return redirect()->back();

     }
     $newExpenses['user_id'] = auth()->user()->id;
     $createExpenses = Expense::create($newExpenses);
     if($createExpenses )
     {
     session()->flash('success', 'تما اضافة الصنف بنجاح');
     return redirect()->back();

     }
     }
     public function editExpenses(Request $request)
     {

     $newExpenses = $request->only($this->reqCateyExpenses);
     $request->validate([
     'name',
      'category_expenses_id',
      'total_price',
      'date',
     ],[
     'name'=>'يجب كتابة الصنف',
     'category_expenses_id'=>'يجب اختيار الصنف',
     'total_price'=>'يجب كتابة السعر',
     'date'=>'يجب كتابة الوقت',
     ]);
     $newExpenses['user_id'] = auth()->user()->id;
     $createExpenses = Expense::where('id',$request->expenses_id)->update($newExpenses);
     if($createExpenses )
     {
     session()->flash('success', 'تما اضافة المصروف بنجاح');
     return redirect()->back();

     }
     }

     public function deleteExpenses($id){
     $deleteExpenses = Expense::where('id',$id)->delete();
     if($deleteExpenses){
     session()->flash('success','تم حذف المصروف بنجاح');
     return redirect()->back();
     }
     }
}
