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
use App\Models\ServicesMaintanence;

class MaintenancController extends Controller
{
    // This First Controller With Maintenance
    protected $requestMaintenance = [
        'group_a',

    ];
    public function index()
    {
        $maintenances = Maintenance::where('user_id', auth()->user()->id)->With('car_parts')->get();
        $cars = Car::where('user_id', auth()->user()->id)->withTrashed()->get();
        $CarParts = CarPart::where('user_id', auth()->user()->id)->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('user.maintenance.maintenance', compact('maintenances', 'categories', 'cars', 'CarParts'));
    }

    public function addMaintan()
    {
        $CarParts = CarPart::where('user_id', auth()->user()->id)->get();
        $cars = Car::where('user_id', auth()->user()->id)->withTrashed()->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();

        return view('user.maintenance.maintanenceAdd', compact('cars', 'categories', 'CarParts'));
    }

    public function addMaintenance(Request $request)
    {

         $request->all();
        //[$request->totalServicesPrice,
        //  $request->totalSparePrice,];
        
          $spareParts =$request->sparePart;
         
         $car = $request->only('car,','user_id', 'category','totalServicesPrice','maintenances_price', 'description');
        $car['user_id'] = auth()->user()->id;
        $car['car_id'] = $request->car;
        $Maintanenc =new  Maintenance;
            $Maintanenc->user_id = $car['user_id'] ;
            $Maintanenc->maintenances_price =$car['maintenances_price'] ;
            $Maintanenc->description =$car['description'] ;
            $Maintanenc->car_id = $car['car_id'];
            $Maintanenc->totalServicesPrice = $car['totalServicesPrice'];
        $Maintanenc->save();
            if($Maintanenc){
            for ($i = 0; $i < count($spareParts); $i++) {
                // Get The Car Part

                $checkCarPart = Purchase::where('user_id',auth()->user()->id)->where('quantity','!=','0')
                                        ->where('car_part_id', $spareParts[$i]['car_part_id'])->first();
                  if ($checkCarPart) {
                      $requestCount = $spareParts[$i]['sparePartCount'];
                      $carPart_id = $spareParts[$i]['car_part_id'];
                      // return $checkCarPart->quantity;

                      $totalQuantityCarPart = $checkCarPart->quantity;

                      if($checkCarPart->quantity <= $requestCount){ return response()->json(['faild', 'الكمية المطلوبة
                        غير متوفرة']);

                        }

                        $updateCountCarPart = $totalQuantityCarPart - $requestCount;

                        $updateStore = Purchase::
                        where('car_part_id', $carPart_id)
                        ->where('id',$checkCarPart->id)->
                        update(['quantity' =>$updateCountCarPart]); 
                  }
              
                   
               

                }
            // Wait For Update New Store ???~~!!!!
                 for ($i=0; $i < count($spareParts); $i++) { // return carr part data return
                   $maintanence_id=$Maintanenc->id;
            // return $resultCheck;
                $insertMaintanence = Maintenance::findOrFail($maintanence_id);
                    // $insertMaintanence->car_parts()->syncWithoutDetaching($spareParts[$i]['car_part_id']);
                    $insertMaintanence->car_parts()->attach(
                    $spareParts[$i]['car_part_id'],['sparePartCount'=>$spareParts[$i]['sparePartCount']]);
                    $user_id = auth()->user()->id;
                    $services =$request->services;
                    $totalServicesPrice = $request->totalServicesPrice;
                    count($services);
                    for ($j=0; $j <count($services) ; $j++) {
                    $createNewServices = ServicesMaintanence::create(
                         [
                        'maintenance_id'=>$maintanence_id,
                        'user_id'=>$user_id,
                        'servicesTitle'=> $services[$j]['servicesName'],
                        'servicesPrice'=>$services[$j]['servicesPrice']
                        ]
                    );
                      // Services Maintanecne For Services
                    }
                   }
           return session()->flash('success', 'تم تسجيل الصيانة بنجاح');
            }
         
            
           
             
        
        


        
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
                $deleteMaintenance = Maintenance::where('id', $id)->first();

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
