<?php

namespace App\Http\Controllers\package;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
            // Start Make Protected Request 
                    protected $requestPackage =
                    ['name','setup_fees','price_monthly','car_limitation','price_year','price'];
    // Start Take from Request
 
    // This first controller with packages 

    public function index(){
    return view('SuperAdmin.package.package');
    }


    public function addPackage(Request $request)
    {// This Function Post New Package
               
        
         
         $dataOfPackage =$request->validate([
             'name'=>'required',

        ]);
             


        
        $createPackage = $request->only($this->requestPackage);

        $createPackage['type'] = $request->type ?? 'free' ;
                $newPackage = Package::create( $createPackage );

                    if($newPackage){
                    session()->flash('success','The New Package Inserted Successfully');
                    return redirect()->back();
                    }
        
    }


                                        
                public function packageList(){// This Function Get The Data of Package
        $packages = Package::all();
        return view('SuperAdmin.package.packageList',compact('packages'));
                }   
                public function editPackage ( Request $request){  // This Function Edit Bakcage
                // $this->requestPackage['type'] = 'banana';
                 $createPackage = $request->only($this->requestPackage);
                $updatePackage = Package::where('user_id',auth()->user()->id)->
                where('id',
                $request->package_id)->update([$createPackage]);
                }

                  public function packagePrice(Request $request){
                         $package_id = $request->id;
                                if($package_id){
                                $packagePrice = Package::where('id',$package_id)
                                        ->select('id','price_monthly','price_year')
                                        ->first();
                                        return response()->json([
                                                'success'=>'Data Rerturn Successfully',
                                                'packagePrice'=>$packagePrice,
                                        ],200);
                                }else{
                                         return response()->json([
                                         'faild'=>'Package Not Found',
                                         ],404);
                                }
                  }
        }


              
