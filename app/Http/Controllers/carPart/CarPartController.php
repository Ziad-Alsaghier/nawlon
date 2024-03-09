<?php

namespace App\Http\Controllers\carPart;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarPart;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CarPartController extends Controller
{
    //      This First Controller With Car Parts
    protected $requesrCarPart = [
        'name', 'product_category_id', 'coverPhoto', 'image', 'code', 'location',
    ];

    public function index()
    {
        $carParts = CarPart::where('user_id', auth()->user()->id)->get();
        $categoriesCars = Category::where('user_id', auth()->user()->id)->get();
        $productCategories = ProductCategory::where('user_id', auth()->user()->id)->get();
        $cars = Car::where('user_id', auth()->user()->id)->get();
        return view('user.carPart.car_part', compact('carParts', 'cars', 'productCategories', 'categoriesCars'));
    }


    public function addCarPart(Request $request)
    {
        // $request->validate([
        //     'name'=>'required',
        //     'product_category_id'=>'required',
        //     'car_id'=>'required',
        //     'coverPhoto'=>'required',
        //     'image'=>'required',
        //     'code'=>'required',
        //     'location'=>'required',
        // ]);
       
        $carPart = $request->only($this->requesrCarPart);
  

        $checkCodeCar = CarPart::where('code', '=', $request->code)->first();
        if ($checkCodeCar) {
            session()->flash('faild', 'هذا الكود موجود بالفعل');
            return redirect()->back();
        }
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
                $carPart['image'] = $img_name;
                move_uploaded_file($tmp_name, 'public/images/carPart/' . $img_name);
            }
        }
        $img_name = null;
        extract($_FILES['coverPhoto']);
        if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $carPart['coverPhoto'] = $img_name;
            }
        }

        $carPart['user_id'] = auth()->user()->id;
        $createCarPart = CarPart::create($carPart);
        $carPart_id= $createCarPart->id;
      
        for ($i=0; $i < count($request->car_id) ; $i++) {
             $insertMaintanence = CarPart::findOrFail($carPart_id);
             $insertMaintanence->cars()->syncWithoutDetaching($request->car_id[$i]);
        }
        if ($createCarPart) {
            move_uploaded_file($tmp_name, 'public/images/carPart/covers/' . $img_name);
            session()->flash('success', 'تم اضافة قطعة الغيار');
            return redirect()->back();
        }
    }
    public function editCarPart(Request $request)
    {


        $carPart = $request->only($this->requesrCarPart);


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
                $carPart['image'] = $img_name;
                move_uploaded_file($tmp_name, 'public/images/carPart/' . $img_name);
            }
        }
        $img_name = null;
        extract($_FILES['coverPhoto']);
        if (!empty($name)) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (in_array($extension, $extension_arr)) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $carPart['coverPhoto'] = $img_name;
            }
        }

        $carPart['user_id'] = auth()->user()->id;

        $createCarPart = CarPart::where('id', $request->carPart_id)->update($carPart);
      
        if ($createCarPart) {
            move_uploaded_file($tmp_name, 'public/images/carPart/covers/' . $img_name);
            session()->flash('success', 'تم التعديل في قطعة الغيار');
            return redirect()->back();
        }
    }

    public function deleteCarPart($id)
    {
        $deleteCarPart = CarPart::where('id', $id)->delete();

        if ($deleteCarPart) {
            session()->flash('success', 'تما الغاء قطعة الغيار بنجاح');
            return redirect()->back();
        }
    }
}
