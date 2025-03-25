<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    public function generateCost($orderId)
    {
        $order = Order::findOrFail($orderId);
        $garment = DB::table('garments')->where('id', $order->garment_id)->first();
        $garmentMaterials = DB::table('garment_materials')->where('garment_id', $order->garment_id)->get();
        $garmentMachines = DB::table('garment_machines')->where('garment_id', $order->garment_id)->get();

        $materialCost = 0;
        foreach ($garmentMaterials as $material) {
            $materialDetails = DB::table('materials')->where('id', $material->material_id)->first();
            $materialCost += $materialDetails->unitCost * $material->quantity_needed;
        }

        $laborCost = $garment->laborHoursPerUnit * $garment->hourlyLaborRate;

        $machineCost = 0;
        foreach ($garmentMachines as $machine) {
            $machineDetails = DB::table('machines')->where('id', $machine->machine_id)->first();
            $machineCost += $machineDetails->hourlyRate * $machine->hoursRequired;
        }

        $totalCost = $materialCost + $laborCost + $machineCost;

        $cost = Cost::updateOrCreate(
            ['order_id' => $orderId],
            [
                'material_cost' => $materialCost,
                'labor_cost' => $laborCost,
                'machine_cost' => $machineCost,
                'total_cost' => $totalCost,
            ]
        );

        return redirect()->route('costs.index')->with('success', 'Cost generated successfully.');
    }

    public function index()
    {
        $costs = Cost::with('order')->get();
        return view('components.costs.index', compact('costs'));
    }
}
