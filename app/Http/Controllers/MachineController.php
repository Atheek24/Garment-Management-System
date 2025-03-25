<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MachineController extends Controller
{
    public function loadAll(){
        $all_machines = Machine::all();
        return view('components.machines.index', compact('all_machines'));
    }

    public function loadAddForm(){
        return view('machines.add');
    }

    public function add(Request $request){
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'hourlyRate'=>'required',
        ]);

        try {
            $new_machine = new Machine;
            $new_machine->name = $request->name;
            $new_machine->type = $request->type;
            $new_machine->hourlyRate = $request->hourlyRate;
            $new_machine->save();

            return redirect()->route('machines.index')->with('success', 'Machine Added Successfully');
        } catch (\Exception $e) {
            return redirect()->route('machines.add')->with('fail', $e->getMessage());
        }
    }

    public function loadEditForm($id){
        $machine = Machine::find($id);
        return view('components.machines.edit', compact('machine'));
    }

    public function edit(Request $request){
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'hourlyRate'=>'required',
        ]);

        try {
            $update_machine = Machine::where('id', $request->id)->update([
                'name'=>$request->name,
                'type'=>$request->type,
                'hourlyRate'=>$request->hourlyRate,
            ]);
            return redirect()->route('machines.index')->with('success', 'Machine Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('machines.edit')->with('fail', $e->getMessage());
        }
    }

    public function updateStatus($id)
    {
        $machine = Machine::find($id);

        if (!$machine) {
            return redirect()->back()->with('fail', 'Machine not found.');
        }

        try {
            $machine->status = $machine->status ? 0 : 1;
            $machine->save();

            if ($machine->status == 0) {
                $garmentMachines = DB::table('garment_machines')
                    ->where('machine_id', $id)
                    ->pluck('garment_id');

                $associatedOrders = DB::table('orders')
                    ->whereIn('garment_id', $garmentMachines)
                    ->where('status', 'Pending')
                    ->exists();

                if ($associatedOrders) {
                    DB::table('orders')
                        ->whereIn('garment_id', $garmentMachines)
                        ->where('status', 'Pending')
                        ->update(['status' => 'In Progress']);

                    $machine->status = 1;
                    $machine->save();
                } else {
                    $machine->status = 0;
                    $machine->save();
                }
            }

            return redirect()->back()->with('success', 'Machine status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to update machine status: ' . $e->getMessage());
        }
    }


    public function delete($id){
        try {
            Machine::where('id',$id)->delete();
            return redirect()->route('machines.index')->with('success', 'Machine Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->route('machines.index')->with('fail', $e->getMessage());
        }
    }
}
