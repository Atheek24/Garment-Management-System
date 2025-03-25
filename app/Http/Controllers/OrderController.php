<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Garment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
     public function loadAll()
     {
         $all_orders = Order::with(['customer', 'garment'])->get();
         $customers = Customer::all();
         $garments = Garment::all();
         return view('components.orders.index', compact('all_orders','customers', 'garments'));
     }
 
     public function loadAddForm()
     {
         $customers = Customer::all();
         $garments = Garment::all();
         $id = 'addGarmentModal';
         return view('components.orders.add', compact('customers', 'garments', 'id'));
     }
 
     public function add(Request $request)
     {
         $request->validate([
             'customer_id' => 'required|exists:customers,id',
             'garment_id' => 'required|exists:garments,id',
             'size' => 'required|string',
             'quantity' => 'required|integer|min:1',
             'due_date' => 'required|date|after_or_equal:today',
         ]);
     
         try {
             $new_order = new Order();
             $new_order->customer_id = $request->customer_id;
             $new_order->garment_id = $request->garment_id;
             $new_order->size = $request->size;
             $new_order->quantity = $request->quantity;
             $new_order->created_by = Auth::user()->name;
             $new_order->order_date = now()->toDateString();
             $new_order->due_date = $request->due_date;
             $new_order->save();

             $garmentMachines = DB::table('garment_machines')
                 ->where('garment_id', $request->garment_id)
                 ->get();
     
             foreach ($garmentMachines as $garmentMachine) {
                 $machine = DB::table('machines')->where('id', $garmentMachine->machine_id)->first();

                 if ($machine && $machine->status == 0) {
                     DB::table('machines')->where('id', $machine->id)->update(['status' => 1]);
                     $new_order->update(['status' => 'In Progress']);
                     break;
                 }
             }
     
             $garmentMaterials = DB::table('garment_materials')
                 ->where('garment_id', $request->garment_id)
                 ->get();
     
             foreach ($garmentMaterials as $garmentMaterial) {
                 DB::table('materials')
                     ->where('id', $garmentMaterial->material_id)
                     ->decrement('quantityInStock', $request->quantity * $garmentMaterial->quantity_needed);
             }
     
             app(CostController::class)->generateCost($new_order->id);
     
             return redirect()->route('orders.index')->with('success', 'Order Added Successfully');
         } catch (\Exception $e) {
             return redirect()->route('orders.add')->with('fail', 'Failed to add order: ' . $e->getMessage());
         }
     }
     

     public function loadEditForm($id)
     {
         $order = Order::findOrFail($id);
         $customers = Customer::all();
         $garments = Garment::all();
         return view('orders.edit-order', compact('order', 'customers', 'garments'));
     }

     public function edit(Request $request)
     {
         $request->validate([
             'customer_id' => 'required|exists:customers,id',
             'garment_id' => 'required|exists:garments,id',
             'size' => 'required|string',
             'quantity' => 'required|integer',
             'due_date' => 'required|date|after_or_equal:order_date',
         ]);
 
         try {
             Order::where('id', $request->id)->update([
                 'customer_id' => $request->customer_id,
                 'garment_id' => $request->garment_id,
                 'size' => $request->size,
                 'quantity' => $request->quantity,
                 'due_date' => $request->due_date,
             ]);
 
             return redirect()->route('orders.index')->with('success', 'Order Updated Successfully');
         } catch (\Exception $e) {
             return redirect()->route('orders.edit')->with('fail', $e->getMessage());
         }
     }

     public function updateStatus($id)
     {
         $order = Order::findOrFail($id);
         $statuses = ['Pending', 'In Progress', 'Completed', 'Cancelled'];
 
         $currentIndex = array_search($order->status, $statuses);
         $nextIndex = ($currentIndex + 1) % count($statuses);
         $order->status = $statuses[$nextIndex];
         $order->save();
 
         return back()->with('success', 'Order status updated successfully');
     }

     public function delete($id)
    {
        try {
            $order = Order::findOrFail($id);
            $garmentId = $order->garment_id;
            $order->delete();
            $garmentMachines = DB::table('garment_machines')
                ->where('garment_id', $garmentId)
                ->pluck('machine_id');

            foreach ($garmentMachines as $machineId) {
                $activeOrders = DB::table('orders')
                    ->where('garment_id', $garmentId)
                    ->exists();
                    
                if (!$activeOrders) {
                    DB::table('machines')->where('id', $machineId)->update(['status' => 0]);
                }
            }

            return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to delete order: ' . $e->getMessage());
        }
    }

    public function getOrderStatusData()
    {
        $completedOrders = DB::table('orders')
            ->selectRaw("MONTHNAME(order_date) as month, COUNT(*) as count")
            ->where('status', 'Completed')
            ->groupBy('month')
            ->orderByRaw("MONTH(order_date)")
            ->pluck('count', 'month')
            ->toArray();

        $cancelledOrders = DB::table('orders')
            ->selectRaw("MONTHNAME(order_date) as month, COUNT(*) as count")
            ->where('status', 'Cancelled')
            ->groupBy('month')
            ->orderByRaw("MONTH(order_date)")
            ->pluck('count', 'month')
            ->toArray();

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $completedData = [];
        $cancelledData = [];

        foreach ($months as $month) {
            $completedData[] = $completedOrders[$month] ?? 0;
            $cancelledData[] = $cancelledOrders[$month] ?? 0;
        }

        return view('index', compact('months', 'completedData', 'cancelledData'));
    }

}
