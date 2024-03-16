<?php

namespace App\Http\Controllers\revenues;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryRevenues;
use App\Models\Nawlone;
use App\Models\revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    // This first Controller With Revenue
    protected $reqCateyRevenue = [
        'name',
        'category_revenue_id',
        'total_price',
        'date',
        'user_id',
    ];
    public function index()
    {
        $revenues = revenue::where('user_id', auth()->user()->id)->get();
        $categoryRevenues = CategoryRevenues::where('user_id', auth()->user()->id)->get();
        $nawlonDone = Nawlone::where('user_id', auth()->user()->id)
                                ->where('status','1')->get();
        return view('user.revenue.revenue', compact('revenues', 'nawlonDone' ,'categoryRevenues'));
    }




    public function AddRevinue(Request $request)
    {
        $newRevenue = $request->only($this->reqCateyRevenue);
        $request->validate([
            'name',
            'category_revenue_id',
            'total_price',
            'date',
        ], [
            'name' => 'يجب كتابة الصنف',
            'category_revenue_id' => 'يجب اختيار الصنف',
            'total_price' => 'يجب كتابة السعر',
            'date' => 'يجب كتابة الوقت',
        ]);

            $checkRevenues = revenue::where('user_id', auth()->user()->id)->
            where('name',$request->name)->first();
            if($checkRevenues ){
            session()->flash('faild', 'هذا الأسم موجود بالفعل');
                return redirect()->back();

            }
        $newRevenue['user_id'] = auth()->user()->id;
        $createRevenue = revenue::create($newRevenue);
        if ($createRevenue) {
            session()->flash('success', 'تما اضافة الايراد بنجاح');
            return redirect()->back();

        }
    }
    public function editRevinue(Request $request)
    {

        $newRevenue = $request->only($this->reqCateyRevenue);
    

          
        $newRevenue['user_id'] = auth()->user()->id;
        $createRevenue = revenue::where('user_id',auth()->user()->id)->where('id',$request->revenues_id)->update($newRevenue);
        if ($createRevenue) {
            session()->flash('success', 'تما اضافة الايراد بنجاح');
            return redirect()->back();

        }

    }



 public function deleteRevenue($id){
 $deleteExpenses = revenue::where('id',$id)->delete();
 if($deleteExpenses){
 session()->flash('success','تم حذف المصروف بنجاح');
 return redirect()->back();
 }
 }


}
