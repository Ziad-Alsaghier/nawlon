<?php

use App\Models\Expense;
use App\Models\Category;
use App\Models\UpdateLicense;

use App\Models\CategoryExpense;
use App\Models\CategoryRevenues;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\taxes\TaxesController;
use App\Http\Controllers\divide\DivideController;
use App\Http\Controllers\users\ProfileController;
use App\Http\Controllers\carPart\CarPartController;
use App\Http\Controllers\license\LicenceController;
use App\Http\Controllers\nawlone\NawloneController;
use App\Http\Controllers\package\PackageController;
use App\Http\Controllers\users\dashboardController;
use App\Http\Controllers\expenses\ExpenseController;
use App\Http\Controllers\revenues\RevenueController;
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\purchase\PurchaseController;
use App\Http\Controllers\revenues\CategoryController;
use App\Http\Controllers\insurance\InsuranceController;
use App\Http\Controllers\SuperAdmin\CustomerController;
use App\Http\Controllers\suppliers\SuppliersController;
use App\Http\Controllers\users\driver\DriverController;
use App\Http\Controllers\violation\violationController;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\license\UpdateLicenseController;
use App\Http\Controllers\maintenanc\MaintenancController;
use App\Http\Controllers\StoreNawlon\StoreNawlonController;
use App\Http\Controllers\expenses\CategoryExpenseController;
use App\Http\Controllers\downLocation\downLocationController;
use App\Http\Controllers\locationTatek\LocationTatekController;
use App\Http\Controllers\reportNawlon\ReportNawlonController;
use App\Http\Controllers\productCategory\productCategoryController;
use App\Http\Controllers\users\carTransport\CarTransportController;
use App\Http\Controllers\users\driverFollow\DriverFollowController;
use App\Http\Controllers\users\carTransport\CategoryTransportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!tour
|

*/




Route::controller(LoginController::class)->group(function(){
        Route::get('Login/login','login')->name('login');
        Route::post('Login/loginCheck','checkLogin')->name('login_check');
        Route::get('Login/loginCheck','logout')->name('login.destroy');
});


// Admin
Route::middleware(['auth','auth.userAdmin'])->controller(PackageController::class)->group(function(){
Route::get('packages/packageAdd','index')->name('package');
Route::post('packages/packageInsert','addPackage')->name('packageInsert');
Route::get('packages/packageList','packageList')->name('packageList');
Route::post('packages/editPackage','editPackage')->name('editPackage');




$controller_path = 'App\Http\Controllers';


// Main Page Route
Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
Route::get('/dashboard/analytics', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
Route::get('/dashboard/ecommerce', $controller_path . '\dashboard\Ecommerce@index')->name('dashboard-ecommerce');
Route::get('/dashboard/profile_admin', $controller_path . '\dashboard\Analytics@profileAdmin')->name('profile_admin');


Route::controller(CustomerController::class)->group(function(){
Route::get('customer/customersAdd','index')->name('customer');
Route::post('customer/customersInserted','addCustomer')->name('newCustomer');
Route::get('customer/customerList','getDataCustomer')->name('customerList');
});

});
// End Admin
// Users
 Route::middleware(['auth', 'auth.user'])->group(function () {
              
        Route::controller(dashboardController::class)->group(function () {
        Route::get('Users/dashboard','index')->name('dashboard');

        });
        // Users/profile
        Route::controller(ProfileController::class)->group(function () {
        Route::get('Users/profile','index')->name('profileUser');
        Route::post('Users/editProfile','editProfile')->name('editProfile');
        // Users/car
        });
        Route::controller(CarTransportController::class)->group(function () {
        Route::get('Users/CarsList','index')->name('carList');
        Route::get('Users/CarsList/{id}','statusCar')->name('statusCarList');
        Route::get('Users/Cars','carAdd')->name('AddNewCar');
        Route::post('Users/CarAddProcessing','newCarAdd')->name('processAddCar');
        Route::get('Users/deleteCar/{id}','deleteCar')->name('deleteCar');
        Route::post('Users/updateCar','updateCar')->name('updateCar');
        Route::get('Users/carInfo/{id}','carInfo')->name('carInfo');
        Route::get('Users/updateStatus/{id}','updateStatus')->name('updateStatus');
        Route::get('Users/storeCar','storeCar')->name('storeCar');
        Route::get('Users/softDelete/{id}','softDelete')->name('softDelete');
        Route::get('Users/filterCar','filterCar')->name('filterCar');
     
 
        });
         // Category Cars 
        Route::controller(CategoryTransportController::class)->group(function () {
        Route::get('Cars/category','index')->name('category');
        Route::get('Cars/categoryAdd','addCategory')->name('addCategory');
        Route::post('Cars/categoryProcess','processAddCategory')->name('processAddCategory');
        Route::get('Cars/deleteCategory/{id}','deleteCategory')->name('deleteCat');
        Route::post('Cars/processEditCategory','processEditCategory')->name('processEditCategory');
     
 
        });
        // License
        Route::controller(LicenceController::class)->group(function () {
        Route::get('Cars/license','index')->name('license');
        Route::post('Cars/Addlicense','addLicense')->name('processAddLicense');
        Route::get('Cars/license/list','listLicense')->name('listLicense');
        Route::get('Cars/license/delete/{id}','deleteLicense')->name('deleteLicense');
        Route::post('Cars/license/update','updateLicense')->name('updateLicense');
        
        
     
     
 
        });

                        // Start Drivers
        Route::controller(DriverController::class)->group(function () {
                Route::get('Driver/driverAdd','index')->name('driverAdd');
                Route::post('Driver/processDriver','addDriver')->name('addDriver');
                Route::get('Driver/driverList','driverList')->name('driverList');
                Route::get('Driver/deleteDriver/{id}','deleteDriver')->name('deleteDriver');
                Route::post('Driver/editDriver','editDriver')->name('editDriver');
        });

        Route::controller(DriverFollowController::class)->group(function () {
                Route::get('Driver/driverFollow','index')->name('driverFollow');
                Route::post('Driver/driverFollowAdd','addDriverFollow')->name('addDriverFollow');
                Route::get('Driver/driverFollowList','editFollowDriver')->name('editFollowDriver');
                Route::get('Driver/deletedriverFollow/{id}','deletedriverFollow')->name('deletedriverFollow');
                Route::post('Driver/editDriverFollow','editDriverFollow')->name('editDriverFollow');
        });

        Route::controller(DivideController::class)->group(function () {
                Route::get('Employee/Divide','index')->name('divide');
                  Route::post('Employee/divideAdd','divideAdd')->name('divideAdd');
                Route::get('Employee/deleteDivide/{id}','deletDivide')->name('deletedivide');
                Route::post('Employee/editDivide','editDivide')->name('editDivide');
               
        });
        Route::controller(EmployeeController::class)->group(function () {
                Route::get('Employee/employeeAdd','index')->name('employee');
                Route::post('Employee/proccessAddEmployee','addEmployee')->name('addEmployee');
                Route::get('Employee/empolyeeList','empolyeeList')->name('empolyeeList');
                Route::post('Employee/empolyeeUpdate','empolyeeUpdate')->name('empolyeeUpdate');
 Route::get('Employee/delete/{id}','deleteEmployee')->name('deleteEmployee');
        });
        Route::controller(violationController::class)->group(function () {
                        Route::prefix('Vaiolation')->group(function(){
                Route::get('violationAdd','index')->name('violation');
                Route::post('proccessViolationAdd','proccessViolationAdd')->name('proccessViolationAdd');
                Route::get('violationList','violationList')->name('violationList');
                Route::get('deleteVaiolation/{id}/{type}','deleteVaiolation')->name('deleteVaiolation');
                Route::post('editViolationCar','editViolationCar')->name('editViolationCar');
                        });
                });


                Route::controller(NawloneController::class)->prefix('Nawlone')->group(function () {
                Route::get('nawloneAdd','index')->name('nawlone');
                Route::post('proccessAddNawlone','addNawlone')->name('addNawlone');
                
                Route::get('nawloneList/{status}','nawloneList')->name('nawloneList');

                Route::get('deletenawlone/{id}','deletenawlone')->name('deletenawlone');
                Route::post('editnawlone','editnawlone')->name('editnawlone');
                Route::post('editStatus','editStatus')->name('editStatus');
                Route::get('nawlonInfo/{id}','nawlonInfo')->name('nawlonInfo');
               

                });
                Route::controller(downLocationController::class)->prefix('DownLocation')->group(function () {
                Route::get('location','index')->name('location');
                Route::post('addLocation','locationAdd')->name('locationAdd');
                Route::get('deletelocation/{id}','deletelocation')->name('deletelocation');
                Route::post('locationEdit','locationEdit')->name('locationEdit');

                });

        Route::controller(SuppliersController::class)->prefix('Suppliers')->group(function () {
                Route::get('addSupplier','index')->name('supplier');
                Route::post('ProccessAddSupplier','store')->name('addSupplier');
                Route::get('supplierList','supplierList')->name('supplierList');
                Route::post('supplierUpdate','supplierUpdate')->name('supplierUpdate');
                Route::get('deleteSupplier/{id}','deleteSupplier')->name('deleteSupplier');
        });

        Route::controller(productCategoryController::class)->prefix('CategoryCar')->group(function(){
                Route::get('categories','index')->name('productCategoryCar');
                Route::post('categories/Add','addProductCategory')->name('addProductCategory');
                Route::get('categories/Add/{id}','deleteCategory')->name('deleteCategory');
                Route::post('editProductCategory','editProductCategory')->name('editProductCategory');
                Route::get('deleteProductCategory/{id}','deleteProductCategory')->name('deleteProductCategory');
        });

        Route::controller(CarPartController::class)->prefix('CarPart')->group(function () {
                Route::get('CreateCar','index')->name('CarPart');
                Route::post('CreateCar','addCarPart')->name('addCarPart');
                Route::get('deleteCarPart/{id}','deleteCarPart')->name('deleteCarPart');
                Route::post('editCarPart','editCarPart')->name('editCarPart');
        });

        Route::controller(PurchaseController::class)->prefix('Purchases')->group(function () {
                Route::get('purchase','index')->name('purchase');
                Route::post('addPurchase','addPurchase')->name('addPurchase');
                Route::get('deletePrchase/{id}','deletePrchase')->name('deletePrchase');
                Route::post('editPurchase','editPurchase')->name('editPurchase');
                Route::get('purchaseInfo/{id}','purchaseInfo')->name('purchaseInfo');
        });

        // Maintenance 
        Route::controller(MaintenancController::class)->prefix('Maintenance')->group(function () {
                Route::get('maintenance','index')->name('maintenance');
                Route::post('addMaintenance','addMaintenance')->name('addMaintenance');
                Route::get('EditMaintenance','EditMaintenance')->name('EditMaintenance');
                Route::get('deleteMaintenance/{id}','deleteMaintenance')->name('deleteMaintenance');
                Route::get('addMaintan','addMaintan')->name('addMaintan');
                Route::get('maintanenceInfo/{id}','maintanenceInfo')->name('maintanenceInfo');
        });

        Route::controller(StoreNawlonController::class)->prefix('Store')->group(function () {
                Route::get('storList', 'index')->name('store');
        });
                        //Category Expense Controller
        Route::controller(CategoryExpenseController::class)->prefix('Category')->group(function () {
                Route::get('expenses','index')->name('categoryExpenses');
                Route::post('proccessAddCategory','store')->name('addCategoryExpenses');
                Route::get('deleteCategory/{id}','deleteCategory')->name('deleteCategory');
                Route::post('editCategory','editCategory')->name('editCategory');
        });
        Route::controller(ExpenseController::class)->prefix('Expense')->group(function () {
                Route::get('expense','index')->name('expenses');
                Route::post('proccessAddCategory','store')->name('proccessAddCategory');
                Route::get('deleteExpenses/{id}','deleteExpenses')->name('deleteExpenses');
                Route::post('editExpenses','editExpenses')->name('editExpenses');
        });
        //Category Revenues Controller
         Route::controller(CategoryController::class)->prefix('Category')->group(function () {
         Route::get('revenues','index')->name('categoryRevenues');
         Route::post('proccessAddRevinue','store')->name('addRevinue');
         Route::get('deleteCategoryRevinue/{id}','deleteCategoryRevinue')->name('deleteCategoryRevinue');
         Route::post('editRevinue','editCategoryRevinue')->name('editCategoryRevinue');
         });


        Route::controller(RevenueController::class)->prefix('Revenue')->group(function () {
                Route::get('revenue','index')->name('revenue');
                Route::post('AddRevinue','AddRevinue')->name('AddRevinue');
                Route::get('deleteRevenue/{id}','deleteRevenue')->name('deleteRevenue');
                Route::post('editRevinue','editRevinue')->name('editRevinue');
        });

        Route::controller(InsuranceController::class)->prefix('Insurance')->group(function () {
                Route::get('insurance', 'index')->name('insurance');
                Route::post('addInsurance', 'store')->name('addInsurance');
                Route::post('editInsurance', 'editInsurance')->name('editInsurance');
                Route::get('deleteInsurance/{id}', 'deleteInsurance')->name('deleteInsurance');
        });


        Route::controller(TaxesController::class)->prefix('Taxes')->group(function () {
                Route::get('taxes','index')->name('taxes');
                Route::post('addTaxes','addTaxes')->name('addTaxes');
                Route::post('updateTaxe','updateTaxe')->name('updateTaxe');
                Route::get('deleteTaxes/{id}','deleteTaxes')->name('deleteTaxes');
        });

        Route::controller(ReportNawlonController::class)->prefix('Report')->group(function () {
                Route::get('reportNawlone','index')->name('report');
        });
        Route::controller(UpdateLicenseController::class)->prefix('Update')->group(function () {
                Route::get('licenseUpdate','index')->name('licenseUpdate');
                Route::post('updateOldLicense','updateOldLicense')->name('updateOldLicense');
                Route::get('deleteUpdateLicense/{id}','deleLicenseUpdate')->name('deleteUpdateLicense');
                Route::post('updateLicenseOld','updateLicenseOld')->name('updateLicenseOld');
        });


        Route::controller(LocationTatekController::class)->prefix('Tatek')->group(function () {
                Route::get('Location','index')->name('tatek');
                Route::post('Location.add','store')->name('storeLocation');
                Route::get('Location.deleteLocation/{id}','deleteLocation')->name('deleteLocation');
                Route::post('Location.editLocation','editLocation')->name('editTatekLocation');

        });
                        
        });


 // End User
