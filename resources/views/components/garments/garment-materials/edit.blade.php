<div id="{{ $id }}" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
    <div class="w-96 rounded-md bg-white p-6 shadow-lg dark:bg-gray-800">
        <h2 class="text-lg font-semibold capitalize text-gray-700 dark:text-white">Edit Material for Garment</h2>
        <form action="{{ route('garment.material.edit', ['id' => $material->id]) }}" method="POST" class="mt-6">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="material_name" class="text-gray-700 dark:text-gray-200">Material Name</label>
                    <input type="text" id="material_name" value="{{ $material->material->name }}" disabled
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-gray-100 px-4 py-2 text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                </div>
                <div>
                    <label for="quantity_needed" class="text-gray-700 dark:text-gray-200">Quantity Needed</label>
                    <input type="number" name="quantity_needed" id="quantity_needed" step="any"
                        required
                        value="{{ $material->quantity_needed }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button type="button" onclick="closeModal('{{ $id }}')"
                    class="mr-2 transform rounded-md bg-gray-500 px-4 py-2.5 text-white hover:bg-gray-400">Cancel</button>
                <button type="submit"
                    class="transform rounded-md bg-blue-600 px-4 py-2.5 text-white hover:bg-blue-500 focus:bg-blue-500">Save</button>
            </div>
        </form>
    </div>
</div>
