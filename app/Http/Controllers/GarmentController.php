<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use App\Models\Machine;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\GarmentMachine;
use App\Models\GarmentMaterial;
use Illuminate\Support\Facades\DB;

class GarmentController extends Controller
{
    public function loadAll(){
        $all_garments = Garment::all();
        return view('components.garments.index', compact('all_garments'));
    }

    public function loadAddForm() {
        $id = 'addGarmentModal';
        return view('components.garments.add', compact('id'));
    }

    public function add(Request $request){
        $request->validate([
            'name'=>'required',
            'design'=>'required',
            'category'=>'required',
            'sizes'=>'required',
            'basePrice'=>'required',
            'laborHoursPerUnit'=>'required',
            'hourlyLaborRate'=>'required',
        ]);

        try {
            $new_garment = new Garment;
            $new_garment->name = $request->name;
            $new_garment->design = $request->design;
            $new_garment->category = $request->category;
            $new_garment->sizes = $request->sizes;
            $new_garment->basePrice = $request->basePrice;
            $new_garment->laborHoursPerUnit = $request->laborHoursPerUnit;
            $new_garment->hourlyLaborRate = $request->hourlyLaborRate;
            $new_garment->save();

            return redirect()->route('garments.index')->with('success', 'Garment Added Succesfully');
        } catch (\Exception $e) {
            return redirect()->route('garments.add')->with('fail', $e->getMessage());
        }
    }

    public function loadEditForm($id){
        $garment = Garment::find($id);
        return view('components.garments.edit', compact('garment'));
    }

    public function edit(Request $request){
        $request->validate([
            'name'=>'required',
            'design'=>'required',
            'category'=>'required',
            'sizes'=>'required',
            'basePrice'=>'required',
            'laborHoursPerUnit'=>'required',
            'hourlyLaborRate'=>'required',
        ]);

        try {
            $updated_garment = Garment::where('id', $request->id)->update([
                'name'=>$request->name,
                'design'=>$request->design,
                'category'=>$request->category,
                'sizes'=>$request->sizes,
                'basePrice'=>$request->basePrice,
                'laborHoursPerUnit'=>$request->laborHoursPerUnit,
                'hourlyLaborRate'=>$request->hourlyLaborRate,
            ]);

            return redirect()->route('garments.index')->with('success', 'Garment Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('garments.edit')->with('fail', $e->getMessage());
        }
    }

    public function updateStatus($id){
        $garment = Garment::find($id);
        if($id){
            if($garment->status){
                $garment->status = 0;
            }else{
                $garment->status = 1;
            }
            $garment->save();
        }
        return back();
    }

    public function delete($id){
        try {
            Garment::where('id', $id)->delete();
            return redirect()->route('garments.index')->with('success', 'Garment Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->route('garments.index')->with('fail', $e->getMessage());
        }
    }

    public function show($id)
    {
        $garment = Garment::findOrFail($id);

        $garmentMachines = GarmentMachine::with('machine')
            ->where('garment_id', $id)
            ->get();

        $garmentMaterials = GarmentMaterial::with('material')
        ->where('garment_id', $id)
        ->get();

        $all_machines = Machine::all();
        $all_materials = Material::all();

        return view('components.garments.more', compact('garment', 'garmentMachines', 'garmentMaterials', 'all_machines', 'all_materials'));
    }

    public function loadAddGarmentMachineForm($id)
    {
        $garment = Garment::findOrFail($id);
        $all_machines = Machine::all();

        return view('components.garments.garment-machines.add', compact('garment', 'all_machines'));
    }


    public function addGarmentMachine(Request $request)
    {
        $request->validate([
            'garment_id' => 'required|exists:garments,id',
            'machine_id' => 'required|exists:machines,id',
            'hoursRequired' => 'required|numeric|min:1',
        ]);

        try {
            $new_garment_machine = new GarmentMachine;
            $new_garment_machine->garment_id = $request->garment_id;
            $new_garment_machine->machine_id = $request->machine_id;
            $new_garment_machine->hoursRequired = $request->hoursRequired;
            $new_garment_machine->save();

            return redirect()->route('garments.more', ['id' => $request->garment_id])->with('success', 'Machine successfully added to garment.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to add machine: ' . $e->getMessage());
        }
    }


    public function loadEditGarmentMachineForm($id)
    {
        $garmentMachine = GarmentMachine::with('machine')->findOrFail($id);
        return view('garments.editGarmentMachine', compact('garmentMachine'));
    }

    public function editGarmentMachine(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:garment_machines,id',
            'hoursRequired' => 'required|numeric|min:1',
        ]);

        try {
            GarmentMachine::where('id', $request->id)->update([
                'hoursRequired' => $request->hoursRequired,
            ]);
            return redirect()->route('garments.more', ['id' => $request->garment_id])->with('success', 'Garment Machine updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to update Garment Machine: ' . $e->getMessage());
        }
    }

    public function deleteGarmentMachine($id)
    {
        try {
            $garmentMachine = GarmentMachine::findOrFail($id);
            $garmentId = $garmentMachine->garment_id;
            $garmentMachine->delete();

            return redirect()->route('garments.more', ['id' => $garmentId])->with('success', 'Garment Machine deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to delete Garment Machine: ' . $e->getMessage());
        }
    }

    public function loadAddGarmentMaterialForm($id)
    {
        try {
            $garment = Garment::findOrFail($id);
            $all_materials = Material::all();

            return view('components.garments.garment-materials.add', compact('garment', 'all_materials'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to load Add Material modal: ' . $e->getMessage()], 500);
        }
    }

    public function addGarmentMaterial(Request $request)
    {
        $request->validate([
            'garment_id' => 'required|exists:garments,id',
            'material_id' => 'required|exists:materials,id',
            'quantity_needed' => 'required|numeric|min:0.01',
        ]);

        try {
            GarmentMaterial::create([
                'garment_id' => $request->garment_id,
                'material_id' => $request->material_id,
                'quantity_needed' => $request->quantity_needed,
            ]);

            return redirect()->route('garments.more', ['id' => $request->garment_id])
                ->with('success', 'Material successfully added to garment.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to add material: ' . $e->getMessage());
        }
    }

    public function loadEditGarmentMaterialForm($id)
    {
        try {
            $garmentMaterial = GarmentMaterial::with('material')->findOrFail($id);

            return view('components.garments.garment-materials.edit', compact('garmentMaterial'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to load Edit Material modal: ' . $e->getMessage()], 500);
        }
    }



    public function editGarmentMaterial(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:garment_materials,id',
            'quantity_needed' => 'required|numeric|min:0.01',
        ]);

        try {
            GarmentMaterial::where('id', $request->id)->update([
                'quantity_needed' => $request->quantity_needed,
            ]);

            return redirect()->route('garments.more', ['id' => $garmentMaterial->garment_id])->with('success', 'Garment Material updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to update material: ' . $e->getMessage());
        }
    }

    public function deleteGarmentMaterial($id)
    {
        try {
            $garmentMaterial = GarmentMaterial::findOrFail($id);
            $garmentId = $garmentMaterial->garment_id;
            $garmentMaterial->delete();

            return redirect()->route('garments.more', ['id' => $garmentId])
                ->with('success', 'Garment Material deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Failed to delete material: ' . $e->getMessage());
        }
    }

}
