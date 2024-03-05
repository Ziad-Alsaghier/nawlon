<?php

namespace App\Http\Controllers\maintenanc;

use App\Models\Car;
use App\Models\CarPart;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Car_CarPart_Maintenance;
use App\Models\Category;
use App\Models\Purchase;

class MaintenancController extends Controller
{
    // This First Controller With Maintenance
    protected $requestMaintenance = [
        'group_a',

    ];
    public function index()
    {
        $maintenances = Maintenance::where('user_id', auth()->user()->id)->With('car_parts')->get();
        $cars = Car::where('user_id', auth()->user()->id)->get();
        $CarParts = CarPart::where('user_id', auth()->user()->id)->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('user.maintenance.maintenance', compact('maintenances', 'categories', 'cars', 'CarParts'));
    }

    public function addMaintan()
    {
        $CarParts = CarPart::where('user_id', auth()->user()->id)->get();
        $cars = Car::where('user_id', auth()->user()->id)->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('user.maintenance.maintanenceAdd', compact('cars', 'categories', 'CarParts'));
    }

    public function addMaintenance(Request $request)
    {
        return $request->all();
        $decreaseCarPart = Purchase::where('car_part_id', $request->car_part_id)->first();

        if ($decreaseCarPart) {
            $countPurchase = $decreaseCarPart->quantity - 1;
            $countPurchase;
            Purchase::where('car_part_id', $request->car_part_id)->update(['quantity' => $countPurchase]);
        }

        $data = $request->validate([
            'description' => 'required',
            'maintenances_price' => 'required',
            'car_id' => 'required',
            'car_part_id' => 'required',
        ]);


        $maintanence = new Maintenance();
        $maintanence->description = $data['description'];
        $maintanence->maintenances_price = $data['maintenances_price'];
        $maintanence->car_id = $data['car_id'];
        // $maintanence->car_part_id = $request->group_a[0]['car_part_id'];
        $maintanence->user_id = auth()->user()->id;
        $maintanence->save();
        $maintanence->car_parts()->attach($data['car_part_id']);
        session()->flash('success', 'تم اضافة الصيانة بنجاح');
        return redirect()->back();
    }
    public function EditMaintenance(Request $request)
    {
    }
    public function deleteMaintenance(Request $request, $id)
    {




        // if Parent Maintanence Exists
        $checkMaintanence = Maintenance::where(
            'id',
            $id
        )->With('car_parts')->first();
        if ($checkMaintanence) {

            $deleteMaint =
                DB::table('maintenance_car_parts')->where(
                    'maintenance_id',
                    $id
                )->delete();
            if ($deleteMaint) {
                $deleteMaintenance = Maintenance::where('id', $id)->delete();

                if ($deleteMaintenance) {
                    session()->flash('success', 'تم الغاء الصيانة ');
                    return redirect()->back();
                }
            }
        }
        // delete Paten Maintanence
        // Delete Parent Maintanence 
    }



    public function maintanenceInfo($id)
    {

        $maintanences = Maintenance::where('user_id', auth()->user()->id)->where('id', $id)
            ->with('car')
            ->with('car_parts')
            ->first();
        return view('user.maintenance.maintenanceInfo', compact('maintanences'));
    }
}
