<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

///Product Group MiddleWare
Route::middleware(['auth', 'role:admin'])->group(function(){
    //Product Controller
    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/dashboard','Product')
        ->name('product');

    });

});// End Group Product middleware

///Admin Group MiddleWare
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])
         ->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])
         ->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])
         ->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])
         ->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])
         ->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])
         ->name('admin.update.password');

});// End Group Admin middleware


///Agent Group MiddleWare
Route::middleware(['auth', 'role:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])
    ->name('agent.dashboard');

});// End Group Agent middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])
->name('admin.login');

///Admin Group MiddleWare
Route::middleware(['auth', 'role:admin'])->group(function(){

    // Property Type All ROute
    Route::controller(PropertyTypeController::class)->group(function(){

        Route::get('/all/type','AllType') ->name('all.type');
        Route::get('/add/type','AddType') ->name('add.type');
        Route::post('/store/type','StoreType') ->name('store.type');
        Route::get('/edit/type/{id}','EditType') ->name('edit.type');
        Route::post('/update/type','UpdateType') ->name('update.type');
        Route::get('/delete/type/{id}','DeleteType') ->name('delete.type');
    });
     // Amenity All ROute
     Route::controller(PropertyTypeController::class)->group(function(){

        Route::get('/all/amenitie','AllAmenitie') ->name('all.amenities');
        Route::get('/add/amenitie','AddAmenitie') ->name('add.amenitie');
        Route::post('/store/amenitie','StoreAmenitie') ->name('store.amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie') ->name('edit.amenitie');
        Route::post('/update/amenitie','UpdateAmenitie') ->name('update.amenitie');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie') ->name('delete.amenitie');
    });

        // Permission Type All ROute
    Route::controller(RoleController::class)->group(function(){

        Route::get('/all/permission','AllPermission') ->name('all.permission');
        Route::get('/add/permission','AddPermission') ->name('add.permission');
        Route::post('/store/permission','StorePermission') ->name('store.permission');
        Route::get('/edit/permission/{id}','EditPermission') ->name('edit.permission');
        Route::post('/update/permission','UpdatePermission') ->name('update.permission');
        Route::get('/delete/permission/{id}','DeletePermission') ->name('delete.permission');
    });

    // Role All Route
    Route::controller(RoleController::class)->group(function(){

        Route::get('/all/role','AllRole') ->name('all.role');
        Route::get('/add/role','AddRole') ->name('add.role');
        Route::post('/store/role','StoreRole') ->name('store.role');
        Route::get('/edit/role/{id}','EditRole') ->name('edit.role');
        Route::post('/update/role','UpdateRole') ->name('update.role');
        Route::get('/delete/role/{id}','DeleteRole') ->name('delete.role');

        // Add role in permission All route
        Route::get('/add/role/permission','AddRolePermission') ->name('add.role.permission');
        Route::post('/role/permission/store','RolePermissionStore') ->name('role.permission.store');
        Route::get('/all/role/permission','AllRolePermission') ->name('all.role.permission');
        Route::get('/admin/edit/role/{id}','AdminEditRole') ->name('admin.edit.role');
        Route::post('/admin/role/update/{id}','AdminUpdateRole') ->name('admin.role.update');
        Route::get('/admin/delete/role/{id}','AdminDeleteRole') ->name('admin.delete.role');


    });

        // Admin User All ROute
    Route::controller(AdminController::class)->group(function(){

        Route::get('/all/admin','AllAdmin') ->name('all.admin');
        Route::get('/add/admin','AddAdmin') ->name('add.admin');
        Route::post('/store/admin','StoreAdmin') ->name('store.admin');
        Route::get('/edit/admin/{id}','EditAdmin') ->name('edit.admin');
        Route::post('/update/admin/{id}','UpdateAdmin') ->name('update.admin');
        Route::get('/delete/admin/{id}','DeleteAdmin') ->name('delete.admin');

    });

     // Client All Route
     Route::controller(ClientController::class)->group(function(){

        // Services all route
        Route::get('/all/services','AllService') ->name('all.services');
        Route::get('/add/services','AddService') ->name('add.services');
        Route::post('/store/services','StoreService') ->name('store.services');
        Route::get('/edit/services/{id}','EditService') ->name('edit.services');
        Route::post('/update/services/{id}','UpdateService') ->name('update.services');
        Route::get('/delete/services/{id}','DeleteService') ->name('delete.services');

        // Leads all route
        Route::get('/all/leads','AllLead') ->name('all.leads');
        Route::get('/add/leads','AddLead') ->name('add.leads');
        Route::post('/store/leads','StoreLead') ->name('store.leads');
        Route::get('/edit/leads/{id}','EditLead') ->name('edit.leads');
        Route::get('/delete/leads/{id}','DeleteLead') ->name('delete.leads');

        // Customers all route
        Route::get('/all/customers','AllCustomer') ->name('all.customers');
        Route::post('/store/customers','StoreCustomer') ->name('store.customers');
        Route::get('/view/customers/{id}','ViewCustomer') ->name('view.customers');
        Route::get('/edit/customers/{id}','EditCustomer') ->name('edit.customers');
        Route::post('/update/customers/{id}','UpdateCustomer') ->name('update.customers');

         // Customer_service all route
         Route::get('/all/customers/service','AllCustomerService') ->name('all.customers.services');
         Route::post('/store/customers/services','StoreCustomerService') ->name('store.customerservices');





    });

});// End Group Admin middleware
