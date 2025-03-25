@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Garment Details</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Details for Garment: {{ $garment->name }}</p>
        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2">
            <div>
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Garment Machines</h3>
                    <button onclick="openModal('addGarmentMachineModal')"
                        class="btn btn-success rounded bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-500">
                        Add Machine
                    </button>
                </div>
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                            ID</th>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                            Machine Name</th>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                            Hours Required</th>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                            colspan="2">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                    @forelse ($garmentMachines as $machine)
                                        <tr>
                                            <td class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-200">
                                                {{ $machine->id }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $machine->machine->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $machine->hoursRequired }}</td>
                                            <td class="px-4 py-3 text-sm">
                                                <button onclick="openModal('editGarmentMachineModal-{{ $machine->id }}')"
                                                    class="text-blue-500 hover:underline">Edit</button>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <form action="{{ route('garment.machine.delete', ['id' => $machine->id]) }}"
                                                    method="GET" class="inline-block">
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this machine?');"
                                                        class="text-red-500 hover:underline">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4"
                                                class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-300">No
                                                machines assigned to this garment.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Garment Materials</h3>
                    <button onclick="openModal('addGarmentMaterialModal')"
                        class="btn btn-success rounded bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-500">
                        Add Material
                    </button>
                </div>
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                            ID</th>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                            Material Name</th>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                            Quantity Needed</th>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                            colspan="2">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                    @forelse ($garmentMaterials as $material)
                                        <tr>
                                            <td class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-200">
                                                {{ $material->id }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $material->material->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $material->quantity_needed }}</td>
                                            <td class="px-4 py-3 text-sm">
                                                <button onclick="openModal('editGarmentMaterialModal-{{ $material->id }}')"
                                                    class="text-blue-500 hover:underline">Edit</button>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <form
                                                    action="{{ route('garment.material.delete', ['id' => $material->id]) }}"
                                                    method="GET" class="inline-block">
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this material?');"
                                                        class="text-red-500 hover:underline">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4"
                                                class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-300">No
                                                materials assigned to this garment.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-garments.garment-machines.add id="addGarmentMachineModal" :garment="$garment" :machines="$all_machines" />
    @foreach ($garmentMachines as $machine)
        <x-garments.garment-machines.edit id="editGarmentMachineModal-{{ $machine->id }}" :machine="$machine" />
    @endforeach

    <x-garments.garment-materials.add id="addGarmentMaterialModal" :garment="$garment" :materials="$all_materials" />
    @foreach ($garmentMaterials as $material)
        <x-garments.garment-materials.edit id="editGarmentMaterialModal-{{ $material->id }}" :material="$material" />
    @endforeach

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
@endsection
