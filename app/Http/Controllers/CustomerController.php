<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function loadAllCustomers(){
        $all_customers = Customer::all();
        return view('components.customers.index', compact('all_customers'));
    }

    public function loadAddCustomerForm(){
        return view('customers.add');
    }

    public function addCustomer(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

        try {
            $new_customer = new Customer;
            $new_customer->name = $request->name;
            $new_customer->email = $request->email;
            $new_customer->phone = $request->phone;
            $new_customer->address = $request->address;
            $new_customer->save();

            return redirect()->route('customers.index')->with('success', 'Customer Added Successfully');
        } catch (\Exception $e) {
            return redirect()->route('customers.add')->with('fail', $e->getMessage());
        }
    }

    public function loadEditCustomerForm($id){
        $customer = Customer::find($id);
        return view('customers.edit-customer',compact('customer'));
    }

    public function editCustomer(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

        try {
            $update_customer = Customer::where('id', $request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
            ]);
            return redirect()->route('customers.index')->with('success', 'Customer Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('customers.edit')->with('fail', $e->getMessage());
        }
    }

    public function updateStatus($id){
        $customer = Customer::find($id);
        if($id){
            if($customer->status){
                $customer->status = 0;
            }
            else{
                $customer->status = 1;
            }
            $customer->save();
        }
        return back();
    }

    public function delete($id){
        try {
            Customer::where('id',$id)->delete();
            return redirect()->route('customers.index')->with('success', 'Customer Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->route('customers.index')->with('fail', $e->getMessage());
        }
    }
}