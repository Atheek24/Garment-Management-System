<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function loadAll(){
        $all_materials = Material::all();
        return view('components.materials.index',compact('all_materials'));
    }

    public function loadAddForm(){
        return view('materials.add');
    }

    public function add(Request $request){
        $request->validate([
            'name'=>'required',
            'unitCost'=>'required',
            'quantityInStock'=>'required',
            'unit'=>'required'
        ]);

        try {
            $new_material = new Material;
            $new_material->name = $request->name;
            $new_material->unitCost = $request->unitCost;
            $new_material->quantityInStock = $request->quantityInStock;
            $new_material->unit = $request->unit;
            $new_material->save();

            return redirect()->route('materials.index')->with('success', 'Material Added Successfully');
        } catch (\Exception $e) {
            return redirect()->route('materials.add')->with('fail', $e->getMessage());
        }
    }

    public function edit(Request $request){
        $request->validate([
            'name'=>'required',
            'unitCost'=>'required',
            'quantityInStock'=>'required',
            'unit'=>'required'
        ]);

        try {
            $update_material = Material::where('id', $request->id)->update([
                'name'=>$request->name,
                'unitCost'=>$request->unitCost,
                'quantityInStock'=>$request->quantityInStock,
                'unit'=>$request->unit
            ]);
            return redirect()->route('materials.index')->with('success', 'Material Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('materials.edit')->with('fail', $e->getMessage());
        }
    }

    public function loadEditForm($id){
        $material = Material::find($id);
        return view('components.materials.edit',compact('material'));
    }

    public function delete($id){
        try {
            Material::where('id',$id)->delete();
            return redirect()->route('materials.index')->with('success', 'Material Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->route('materials.index')->with('fail', $e->getMessage());
        }
    }
}
