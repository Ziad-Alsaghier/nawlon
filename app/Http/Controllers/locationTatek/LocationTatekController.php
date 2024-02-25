<?php

namespace App\Http\Controllers\locationTatek;

use App\Http\Controllers\Controller;
use App\Models\LocationTatek;
use Illuminate\Http\Request;

class LocationTatekController extends Controller
{
    protected $dataRequest = [
        'name',
        'user_id',
    ];
    // This First Controller With Tatek Location


    public function index(){
        $locatonTatek = LocationTatek::where('user_id', auth()->user()->id)->get();
        return view('user.tatekLocation.location',compact('locatonTatek'));
    }


    public function store(Request $request){
        $requestLocationTatek = $request->only($this->dataRequest);
        $requestLocationTatek['user_id'] = auth()->user()->id; 
        $createLocationTatek = LocationTatek::create($requestLocationTatek);

            if($createLocationTatek){
            session()->flash('success', 'تم اضافة مكان التعتيق بنجاح');
            return redirect()->back();
            }


    }
    public function editLocation(Request $request){
        $requestLocationTatek = $request->only($this->dataRequest);
        $requestLocationTatek['user_id'] = auth()->user()->id; 
        $createLocationTatek = LocationTatek::where('id',$request->location_id)->update($requestLocationTatek);

            if($createLocationTatek){
            session()->flash('success', 'تم اضافة مكان التعتيق بنجاح');
            return redirect()->back();
            }


    }



    public function deleteLocation($id){
        $deleteLocation = LocationTatek::where('id', $id)->delete();

                        if($deleteLocation){
            session()->flash('success','تم الفاء مكان التعتيق');
            return redirect()->back();
                        }
    }
}
