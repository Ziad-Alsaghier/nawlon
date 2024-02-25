<?php

namespace App\Http\Controllers\taxes;

use App\Models\Car;
use App\Models\tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxesController extends Controller
{
    // this first controller with taxes

    protected $requestTaxes = ['car_id', 'total_tex','user_id', 'date',];
    public function index()
    {

        $taxes = tax::where('user_id', auth()->user()->id)->get();
        $cars = Car::where('user_id', auth()->user()->id)->get();
        return view('user.taxes.taxes', compact('taxes', 'cars'));
    }

    public function addTaxes(Request $request)
    {
        $newTaxes = $request->only($this->requestTaxes);
        $request->validate([
            'car_id' => 'required',
            'total_tex' => 'required',
            'date' => 'required',
        ], [
            'car_id' => 'يجب اختيار سيارة',
            'total_tex' => 'يجب كتابة سعر الضريبة',
            'date' => 'يجب  تحديد وقت الدفع',
        ]);
        $newTaxes['user_id'] = auth()->user()->id;
        $createTaxes = tax::create($newTaxes);
        if ($createTaxes) {
            session()->flash('success', 'تم اضافة الضريبة بنجاح');
            return redirect()->back();
        }
    }
    public function updateTaxe(Request $request)
    {
        $newTaxes = $request->only($this->requestTaxes);
        $createTaxes = tax::where('id', $request->taxes_id)->update($newTaxes);
        if ($createTaxes) {
            session()->flash('success', 'تم تعديل الضريبة بنجاح');
            return redirect()->back();
        }
    }

    public function deleteTaxes($id){
        $deleteTax = tax::where('id',$id)->delete();
            if($deleteTax){
            session()->flash('success','تم الغاء الضريبة');
            return redirect()->back();
            }
    }
}
