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

        Route::get('/allpermission','AllPermission') ->name('all.permission');
        Route::get('/addpermission','AddPermission') ->name('add.permission');
        Route::post('/storepermission','StorePermission') ->name('store.permission');
        Route::get('/editpermission/{id}','EditPermission') ->name('edit.permission');
        Route::post('/updatepermission','UpdatePermission') ->name('update.permission');
        Route::get('/deletepermission/{id}','DeletePermission') ->name('delete.permission');
    });

    // Role All Route
    Route::controller(RoleController::class)->group(function(){

        Route::get('/listallrole','AllRole') ->name('listallrole');
        Route::get('/addrole','AddRole') ->name('add.role');
        Route::post('/storerole','StoreRole') ->name('store.role');
        Route::get('/editrole/{id}','EditRole') ->name('edit.role');
        Route::post('/updaterole','UpdateRole') ->name('update.role');
        Route::get('/deleterole/{id}','DeleteRole') ->name('delete.role');

        // Add role in permission All route
        Route::get('/addrolepermission','AddRolePermission') ->name('addrolepermission');
        Route::post('/role/permission/store','RolePermissionStore') ->name('role.permission.store');
        Route::get('/allrolepermission','AllRolePermission') ->name('allrolepermission');
        Route::get('/admineditrole/{id}','AdminEditRole') ->name('admin.edit.role');
        Route::post('/adminroleupdate/{id}','AdminUpdateRole') ->name('admin.role.update');
        Route::get('/admindeleterole/{id}','AdminDeleteRole') ->name('admin.delete.role');


    });

        // Admin User All ROute
    Route::controller(AdminController::class)->group(function(){

        Route::get('/alladmin','AllAdmin') ->name('all.admin');
        Route::get('/addadmin','AddAdmin') ->name('add.admin');
        Route::post('/storeadmin','StoreAdmin') ->name('store.admin');
        Route::get('/editadmin/{id}','EditAdmin') ->name('edit.admin');
        Route::post('/updateadmin/{id}','UpdateAdmin') ->name('update.admin');
        Route::get('/deleteadmin/{id}','DeleteAdmin') ->name('delete.admin');

    });

     // Client All Route
     Route::controller(ClientController::class)->group(function(){

        // Services all route
        Route::get('/allservices','AllService') ->name('all.services');
        Route::get('/addservices','AddService') ->name('add.services');
        Route::post('/storeservices','StoreService') ->name('store.services');
        Route::get('/editservices/{id}','EditService') ->name('edit.services');
        Route::post('/updateservices/{id}','UpdateService') ->name('update.services');
        Route::get('/deleteservices/{id}','DeleteService') ->name('delete.services');

        // Leads all route
        Route::get('/allleads','AllLead') ->name('all.leads');
        Route::get('/addleads','AddLead') ->name('add.leads');
        Route::post('/storeleads','StoreLead') ->name('store.leads');
        Route::get('/editleads/{id}','EditLead') ->name('edit.leads');
        Route::get('/deleteleads/{id}','DeleteLead') ->name('delete.leads');

        // Customers all route
        Route::get('/allcustomers','AllCustomer') ->name('all.customers');
        Route::post('/storecustomers','StoreCustomer') ->name('store.customers');
        Route::get('/viewcustomers/{id}','ViewCustomer') ->name('view.customers');
        Route::get('/editcustomers/{id}','EditCustomer') ->name('edit.customers');
        Route::post('/updatecustomers/{id}','UpdateCustomer') ->name('update.customers');

         // Customer_service all route
         Route::get('/allcustomers/service','AllCustomerService') ->name('all.customers.services');
         Route::post('/storecustomers/services','StoreCustomerService') ->name('store.customerservices');





    });

});// End Group Admin middleware
