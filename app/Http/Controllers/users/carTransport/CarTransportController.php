<?php

namespace App\Http\Controllers\users\carTransport;

use App\Models\Car;
use App\Models\Category;
use App\Models\Maintenance;
use App\Models\Nawlone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Contracts\Service\Attribute\Required;

class CarTransportController extends Controller
{

        protected $requestCar = [
                'cars_name',
                'car_type',
                'brand',
                'category_id',
                'car_number',
                'image',
                'user_id',
                'status',
        ];
        // This First Controller With Users => Manage Transpor Cars

        public function index()
        { // Return The View Car

                $categories = Category::where('user_id', auth()->user()->id)->get();
                $cars = Car::where('user_id', auth()->user()->id)->withTrashed()->orderBy('created_at', 'DESC')->get();


                return view('user.carsTransport.carList', compact('cars', 'categories'));
        }
        public function carAdd()
        { // Return Data OF Category Choose When i Add New Car
                $categories = Category::where('user_id', auth()->user()->id)->get();
                return view('user.carsTransport.carAdd', compact('categories'));
        }

        public function newCarAdd(Request $request)
        { // Start Add New Car
                $createNewCar = $request->only($this->requestCar);

                $newCar = $request->validate([
                        'cars_name' => 'required',
                        'car_type' => 'required',
                        'brand' => 'required',
                        'category_id' => 'required',
                        'car_number' => 'required',
                        'image' => 'required',
                ], [
                        'car_name' => ' اسم السيارة فارغ !',
                        'type_car' => 'نوع السيارة فارغ !',
                        'brand' => ' ماركة السيارة فارغة !',
                        'car_number' => ' رقم السيارة فارغ !',
                        'category' => ' فئة السيارة فارغ !',
                        'image' => '   يجب اضافة صورة !',
                ]);

                $img_name = null;
                extract($_FILES['image']);
                if (!empty($name)) {
                        $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                        $extension = explode('.', $name);
                        $extension = end($extension);
                        $extension = strtolower($extension);
                        if (in_array($extension, $extension_arr)) {
                                $img_name = rand(0, 1000) . now() . $name;
                                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                                $createNewCar['image'] = $img_name;
                        }
                }
                $car = Car::where('user_id', auth()->user()->id)->get();
                $createNewCar['user_id'] = auth()->user()->id;
                $carInserted = count($car);
                $createNewCar['status'] = '1';

                $carPackageLimit = auth()->user()->package->car_limitation;
                if ($carPackageLimit <= $carInserted) {
                        session()->flash('faild', 'لا يمكن اضافة سيارة اخري لاستخدام العدد الكامل من السيارات');
                        return redirect()->back();
                }
                $insertNewCar = car::create($createNewCar);
                if ($insertNewCar) {
                        move_uploaded_file($tmp_name, 'public/images/cars/' . $img_name);
                        session()->flash('success', 'تم اضافة السيارة بنجاح');
                        return redirect()->back();
                }
        }
        public function deleteCar($id)
        { // Start Delete Car
                $checkData = Car::where('id', $id)
                        ->where('status', '2')->first();
                if ($checkData) {
                        session()->flash('faild', 'السيارة في الطريق لا يمكن مسحها');
                        return redirect()->back();
                } else {

                        $deletCar = car::where('id', $id)->delete();

                        if ($deletCar) {
                                session()->flash('success', 'تم الغاء السيارة بنجاح');
                                return redirect()->back();
                        }
                }
        }
        public function softDelete($id)
        { // Start Delete Car

                $checkData = Car::where('id', $id)
                        ->where('status', '2')->first();
                if ($checkData) {
                        session()->flash('faild', 'السيارة في الطريق لا يمكن مسحها');
                        return redirect()->back();
                } else {

                        $deletCar = car::where('id', $id)->forceDelete();

                        if ($deletCar) {
                                session()->flash('success', 'تم الغاء السيارة بنجاح');
                                return redirect()->back();
                        }
                }
        }




        public function updateCar(Request $request)
        {
                $request->car_id;
                $requestUpdateCar = $request->only('cars_name', 'car_type', 'brand', 'car_number', 'image');
                $requestUpdatecategory = $request->only('category');


                $img_name = null;
                extract($_FILES['image']);
                if (!empty($name)) {
                        $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                        $extension = explode('.', $name);
                        $extension = end($extension);
                        $extension = strtolower($extension);
                        if (in_array($extension, $extension_arr)) {
                                $img_name = rand(0, 1000) . now() . $name;
                                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                                $requestUpdateCar['image'] = $img_name;
                        }
                }
                $updateCar = car::where('id', $request->car_id)->update($requestUpdateCar);
                $updateCategory = Category::where('id', $request->category_id)->update($requestUpdatecategory);

                if ($updateCar) {
                        move_uploaded_file($tmp_name, 'public/images/cars/' . $img_name);
                        session()->flash('success', 'تم التعديل بنجاح');
                        return redirect()->back();
                }
        }


        public function statusCar($id)
        {
                $categories = Category::where('user_id', auth()->user()->id);
                $cars = car::where('user_id', auth()->user()->id)->where('status', $id)->get();
                return view('user.carsTransport.carList', compact('cars', 'categories'));
        }

        public function carInfo($id)
        {
                $categories = Category::where('user_id', auth()->user()->id);
                $car = car::where('user_id', auth()->user()->id)->with('nawlon')->where('id', $id)->withTrashed()->first();
                $totalnawlon = 0;
                for ($i = 0; $i < count($car->nawlon); $i++) {
                        $totalnawlon += $car->nawlon[$i]['nawlone_price'];
                }


                return view('user.carsTransport.carInfoProfile', compact('car', 'totalnawlon', 'categories'));
        }
        public function filterNawlon(request $request)
        {

                $nawlon = Nawlone::whereBetween('created_at', [$request->start_date, $request->end_date])->where('car_id', $request->car_id)->get();

                if ($nawlon) {

                        return response()->json(['success' => 'data return successfully', 'nawlone' => $nawlon]);
                } else {

                        return response()->json(['faild' => 'Data Is Empty']);
                }
        }


        public function filterMaintanence(Request $request)
        {

                $maintanence = Maintenance::whereBetween('created_at', [$request->start_date_maintanence, $request->end_date_maintanence])->where('car_id', $request->car_id)->with('car')->with('car_parts')->get();
                if ($maintanence) {

                        return response()->json([
                                'success' => 'data return successfully',
                                'maintanence' => $maintanence
                        ]);
                } else {

                        return response()->json(['faild' => 'Data Is Empty']);
                }
        }
        public function updateStatus(Request $request, $id)
        {
                $request->status;
                $updateStatusCar = Car::where('id', $id)->update(
                        ['status' => $request->status]
                );
                if ($updateStatusCar) {
                        session()->flash('success', 'تم تغيير حالة السيارة بنجاح');

                        return redirect()->back();
                }
        }



        public function storeCar()
        {

                $cars = Car::where('user_id', auth()->user()->id)->onlyTrashed()->get();
                return view('user.carsTransport.carStore', compact('cars'));
        }


        public function filterCar(Request $request)
        {
                $request->car_state;
                $car = Car::where('user_id', auth()->user()->id)
                        ->where('status', $request->category_id)->get();
                return response()->json([
                        'success' => 'data Returned Successfully',
                        'car_data' => $car,
                ]);
        }
}
