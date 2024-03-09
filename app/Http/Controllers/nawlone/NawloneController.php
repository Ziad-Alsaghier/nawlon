<?php

namespace App\Http\Controllers\nawlone;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Models\DownLocation;
use App\Models\Driver;
use App\Models\LocationTatek;
use App\Models\Nawlone;

use Illuminate\Http\Request;

class NawloneController extends Controller
{
    protected $nawlonePosts = [
        'car_id',
        'driver_id',
        'down_location_id', // id For down location tatek
        'location_name',// name Location down
        'location_name',// name Location down
        'location_tatek_id', // id tatek
        'location_tatek_name', // string Name For location tatek
        'nawlone_price',
        'comsion_driver',
        'custody',
        'solar',
        'status',
        'user_id',
    ];
    // This First Controller With Nawlone Se3r Elna2la Elwa7da

    public function index()
    {

        $cars = Car::where('user_id', auth()->user()->id)
            ->where('status', '1')
                    ->withTrashed()
            ->orderBy('cars_name', 'ASC')->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();
        $driveres = Driver::where('user_id',auth()->user()->id)->get();
        $locations = DownLocation::where('user_id', auth()->user()->id)->orderBy('name', 'ASC')->get();
        return view('user.nawlone.nawloneAdd', compact('cars','driveres', 'categories', 'locations'));
    }

    public function addNawlone(Request $request)
    {
       $dataNawlone = $request->only($this->nawlonePosts);

                if($request->down_location_id == 'other' ){
             $dataNawlone['location_name'] = $request->location_name ;
             $dataNawlone['down_location_id'] = Null ;
                }
                if($request->location_tatek_id == 'other'){
             $dataNawlone['location_tatek_name'] = $request->tatek_location_name;
             $dataNawlone['location_tatek_id'] =Null;
                }
             
        $dataNawlone['user_id'] = auth()->user()->id;

        $checkStatusCar = Car::where('id', $request->car_id)->first();
        if ($checkStatusCar->status == '0' || $checkStatusCar->status == '2') {
            session()->flash('faild', 'السيارة غير متوفرة الأن');
            return redirect()->back();
        } else {


            // add nawlon
            $addNewNawlone = Nawlone::create($dataNawlone);
            if ($addNewNawlone) {

                $carStatus = Car::where('id', $request->car_id)->update(['status' => '2']);

                session()->flash('success', 'تم اضافة الناولون بنجاح والسيارة في الطريق');
                return redirect()->route('nawloneList', ['status']);
            }
            // add nawlon
        }
    }

    public function nawloneList($status)
    {
         $nawlones = Nawlone::where('user_id', auth()->user()->id)->with('car')->orderBy('created_at', 'desc')->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();
        foreach ($nawlones as $nawlone) {
            $nawlone->car;
        }
        $cars = Car::where('user_id', auth()->user()->id)
            ->where('status', $status)->get();
                $driveres = Driver::where('user_id',auth()->user()->id)->get();
        $locations = DownLocation::where('user_id', auth()->user()->id)->get();
        $locationTatek = LocationTatek::where('user_id', auth()->user()->id)->get();
        return view('user.nawlone.nawloneList', compact('nawlones','driveres', 'cars', 'categories',
        'locationTatek','locations'));
    }
    public function editStatus(Request $request)
    {

        $updateStatus = $request->only('custody', 'solar', 'car_id', 'status');

        $nawlone = Nawlone::where('id', $request->nawlone_id)->first();

        $updateStatus['status'] = $request->status;

        if ($request->solar < $nawlone->solar) {
            session()->flash('faild', 'لا يمكن ادخال هذه القيمة');
            return redirect()->back();
        }

        $updateStatus['status'] = '1';


        $updateStatus = Nawlone::where('id', $request->nawlone_id)->update($updateStatus);


        if ($updateStatus) {
            $carStatus = Car::where('id', $request->car_id)->update(['status' => '1']);
            session()->flash('success', 'تم وصول السائق');

            return redirect()->back();
        }
    }
    public function editnawlone(Request $request)
    {
        $requestsnawlone = $request->only([
            'car_id',
            'down_location_id',
            'tatek_location',
            'nawlone_price',
            'comsion_driver',
            'custody',
            'solar',
            'status',
        ]);
        // $request->validate([
        // 'tatek_location'=>'required',
        // 'nawlone_price'=>'required',
        // 'comsion_driver'=>'required',
        // 'custody'=>'required',
        // 'solar'=>'required',
        // 'status'=>'required',
        // ]);


        $request->down_location_id;
        $updateNawlone = Nawlone::where('id', $request->nawlone_id)->update($requestsnawlone);

        if ($updateNawlone) {
            session()->flash('success', 'تم التعديل في الناولون بنجاح');
            return redirect()->back();
        }
    }

    // Handl Report Nawlon
    public function nawlonInfo($id)
    {
        $nawlone = Nawlone::where('id', $id)->With('car')->With('driver')->with('down_location')->first();


        return view('user.nawlone.nawlonInfo', compact('nawlone'));
    }
    // Handl Report Nawlon


    public function deletenawlone($id)
    {
        // Delete Nawlon 

        $deleteNawlon = Nawlone::where('id', $id)->delete();
        if ($deleteNawlon) {
            session()->flash('success', 'تم الغاء هذا الناولون');
            return redirect()->back();
        }
    }
}
