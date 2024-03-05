<?php

namespace App\Http\Controllers\users;

use App\Models\Car;
use App\Models\driverFollow;
use App\Models\Nawlone;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarPart;
use App\Models\Driver;
use App\Models\Expense;
use App\Models\Maintenance;
use App\Models\revenue;
use App\Models\User;
use Carbon\Carbon;

class dashboardController extends Controller
{
        // This First Controller With USERS 

        public  function index()
        {

                $nawlones = Nawlone::select('nawlone_price')->where('status', '0')
                        ->whereMonth('created_at', Carbon::now()->month)->where('user_id', auth()->user()->id)->get();
                $countNawlone = count($nawlones);
                $nawlones = Nawlone::select('nawlone_price')->where('status', '0')
                        ->whereMonth('created_at', Carbon::now()->month)->where('user_id', auth()->user()->id)->get();
                $totalNawlon = 0;
                for ($i = 0; $i < count($nawlones); $i++) {
                        $totalNawlon += $nawlones[$i]['nawlone_price'];
                }



                // Cars
                $car = Car::where('user_id', auth()->user()->id)->get();
                $countCar = count($car);
                $busyCar = Car::where('user_id', auth()->user()->id)->where('status', '2')->get();
                $countBusyCar = count($busyCar);


                $availableCar = Car::where('user_id', auth()->user()->id)->where('status', '1')->get();
                $countavailableCar = count($availableCar);

                $unAvailableCar = Car::where('user_id', auth()->user()->id)->where('status', '0')->get();
                $countunAvailableCar = count($unAvailableCar);


                // Cars
                // Driver      
                $driver = Driver::where('user_id', auth()->user()->id)->get();
                $countDriver = count($driver);
                $availableDriver = Driver::where('user_id', auth()->user()->id)->where('status', '1')->get();
                $countavailableDriver = count($availableDriver);

                // Driver
                $driverFollow = driverFollow::where('user_id', auth()->user()->id)->get();
                $countDriverFollow = count($driverFollow);
                // Cars
                // Maintanence
                $maintanence = Maintenance::select('maintenances_price')->where('user_id', auth()->user()->id)
                        ->whereMonth('created_at', Carbon::now()->month)->get();
                $total = 0;
                for ($i = 0; $i < count($maintanence); $i++) {
                        $total += $maintanence[$i]['maintenances_price'];
                }
                $countMaintanence = count($maintanence);
                // Maintanence  


                // Revenues
                $revenues = revenue::whereMonth('created_at', Carbon::now()->month)->get();
                $revenues;
                $totalRevenues = 0;
                for ($i = 0; $i < count($revenues); $i++) {
                        $totalRevenues += $revenues[$i]['total_price'];
                }
                // Revenues

                // Expenses
                $expenses = Expense::where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->month)->get();

                $totalExpenses = 0;
                for ($i = 0; $i < count($expenses); $i++) {
                        $totalExpenses += $expenses[$i]['total_price'];
                }
                // Expenses



                //  Car Part Count    
                $carPart = CarPart::where('user_id', auth()->user()->id)->whereMonth(
                        'created_at',
                        Carbon::now()->month
                )->get();
                $totalCarPart = count($carPart);
                return
                        view('user.dashboard', compact(
                                'countNawlone',
                                'nawlones',
                                'countCar',
                                'countDriver',
                                'totalNawlon',
                                'countDriverFollow',
                                'countMaintanence',
                                'total',
                                'maintanence',
                                'countavailableCar',
                                'countunAvailableCar',
                                'totalRevenues',
                                'countavailableDriver',
                                'totalExpenses',
                                'totalCarPart',
                                'countBusyCar'
                        ));
        }



        public function updateImage(Request $request)
        {

                $updatedImage = $request->validate([
                        'logoImage' => 'required',
                ]);



                    
              // test
               $logoImage = null;
               if (!empty($name)) {
                       extract($_FILES['logoImage']);
              $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
              $extension = explode('.', $name);
              $extension = end($extension);
              $extension = strtolower($extension);
              if (in_array($extension, $extension_arr)) {
              $logoImage = rand(0, 1000) . now() . $name;
              $logoImage = str_replace([' ', ':', '-'], 'X', $logoImage);
              $requestDriver['logoImage'] = $logoImage;
              
              return  move_uploaded_file($tmp_name, 'public/images/customer/' . $logoImage);
              }


              }
                
                $customer = User::where('id', auth()->user()->id)->update(
                        [
                                'logoImage' => $request->logoImage,
                        ]
                );
                $customerData = User::select('logoImage')->where('id', auth()->user()->id)->first();
                return response()->json(['success' => 'Data Return Successfully', $customerData]);
        }
}
