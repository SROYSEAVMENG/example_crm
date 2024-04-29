<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\CustomerServices;
use App\Models\Leads;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function AllService(){

        $services = Services::latest()->get();
        return view('backend.client.service.all_service',compact('services'));

    } //End Method

    public function AddService(){

        return view('backend.client.service.add_service');

    } //End Method

    public function StoreService(Request $request){

        $request->validate([
          'name' => 'required|max:200',
          'description' => 'required'
        ]);

        Services::insert([
          'name' => $request->name,
          'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Services Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.services')->with($notification);

      } //End Method

      public function EditService($id){

        $services = Services::findOrFail($id);
        return view('backend.client.service.edit_service',compact('services'));

    }// End MEthod

    public function UpdateService(Request $request){

        $sid = $request->id;

        Services::findOrFail($sid)->update([
          'name' => $request->name,
          'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Service Updated Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.services')->with($notification);

      } //End Method

      public function DeleteService($id){

        Services::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Service Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method


      ////////////////////////////////////////////* Leads All Method *///////////////////////////////////////////////////////////


      public function AllLead(){

        $leads = Leads::latest()->get();
        $services = Services::all();
        return view('backend.client.lead.all_lead',compact('leads','services'));

    } //End Method

    public function AddLead(){

        return view('backend.client.lead.add_lead');

    } //End Method

    public function StoreLead(Request $request){

        $request->validate([
          'name' => 'required|max:200',
          'email'=>'required',
          'phone'=>'required',
          'address'=>'required',
          'city'=>'required',
          'description' => 'required'
        ]);

        Leads::insert([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'city' => $request->city,
          'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Lead Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.leads')->with($notification);

      } //End Method

      public function EditLead($id){

        $leads = Leads::findOrFail($id);
        $services = Services::all();
        $users = User::all();
        return view('backend.client.lead.edit_lead',compact('leads','services','users'));

    }// End MEthod

    public function DeleteLead($id){

        Leads::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Lead Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method




    ////////////////////////////////////////////* Customers All Method *///////////////////////////////////////////////////////////

    public function AllCustomer(){

        $customers = Customers::latest()->get();
        return view('backend.client.customer.all_customer',compact('customers'));

    } //End Method

    public function StoreCustomer(Request $request){

        $request->validate([
          'name' => 'required|max:200',
          'email'=>'required',
          'phone'=>'required',
          'address'=>'required',
          'city'=>'required',
          'description' => 'required'
        ]);

        Customers::insert([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'city' => $request->city,
          'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Customer Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.customers')->with($notification);

      } //End Method

    //   public function EditCustomer($id){

    //     $customers = Customers::findOrFail($id);
    //     return view('backend.client.customer.all_customer',compact('customers'));

    // }// End MEthod

    public function ViewCustomer($id){

        $customers = Customers::findOrFail($id);

        return view('backend.client.customer.view_customer',compact('customers'));

    }// End MEthod

        ////////////////////////////////////////////* Customers_Service All Method *///////////////////////////////////////////////////////////

        public function AllCustomerService(){

            $c_services = CustomerServices::latest()->get();

            return view('backend.client.customer.CustomerService.all_service',compact('c_services'));

        } //End Method

        public function StoreCustomerService(Request $request){

            $request->validate([
              'name' => 'required|max:200',
              'email'=>'required',
              'phone'=>'required',
              'address'=>'required',
              'city'=>'required',
              'description' => 'required'
            ]);

            Customers::insert([
              'name' => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'address' => $request->address,
              'city' => $request->city,
              'description' => $request->description,
            ]);
            $notification = array(
              'message' => 'Customer Created Succesfully',
              'alert-type' => 'success'
          );

          return redirect()->route('all.customers')->with($notification);

          } //End Method






}
