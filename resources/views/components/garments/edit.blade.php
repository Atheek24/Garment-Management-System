<div id="{{ $id }}" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
    <div class="w-[600px] rounded-md bg-white p-6 shadow-lg dark:bg-gray-800">
        <h2 class="text-lg font-semibold capitalize text-gray-700 dark:text-white">Edit Garment</h2>

        @if (Session::has('fail'))
            <div class="mt-4 rounded bg-red-100 p-2 text-red-600 dark:bg-red-200">
                {{ Session::get('fail') }}
            </div>
        @endif

        <form action="{{ route('garments.edit', ['id' => $garment->id ?? '']) }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="id" value="{{ $garment->id }}">

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="name" class="text-gray-700 dark:text-gray-200">Name</label>
                    <input type="text" name="name" id="name" value="{{ $garment->name ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Garment Name" required>
                </div>

                <div>
                    <label for="design" class="text-gray-700 dark:text-gray-200">Design</label>
                    <input type="text" name="design" id="design" value="{{ $garment->design ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Garment Design" required>
                </div>

                <div>
                    <label for="category" class="text-gray-700 dark:text-gray-200">Category</label>
                    <select name="category" id="category"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        <option value="Casual" {{ $garment->category === 'Casual' ? 'selected' : '' }}>Casual</option>
                        <option value="Sportswear" {{ $garment->category === 'Sportswear' ? 'selected' : '' }}>
                            Sportswear</option>
                        <option value="Formal" {{ $garment->category === 'Formal' ? 'selected' : '' }}>Formal</option>
                        <option value="Accessories" {{ $garment->category === 'Accessories' ? 'selected' : '' }}>
                            Accessories</option>
                    </select>
                </div>

                <div>
                    <label for="sizes" class="text-gray-700 dark:text-gray-200">Sizes</label>
                    <input type="text" name="sizes" id="sizes" value="{{ $garment->sizes ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Sizes (e.g., S, M, L, XL)" required>
                </div>

                <div>
                    <label for="basePrice" class="text-gray-700 dark:text-gray-200">Base Price</label>
                    <input type="number" step="0.01" name="basePrice" id="basePrice"
                        value="{{ $garment->basePrice ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Base Price" required>
                </div>

                <div>
                    <label for="status" class="text-gray-700 dark:text-gray-200">Status</label>
                    <select name="status" id="status"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        <option value="1" {{ $garment->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $garment->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div>
                    <label for="laborHoursPerUnit" class="text-gray-700 dark:text-gray-200">Labor Hours Per Unit</label>
                    <input type="number" step="0.01" name="laborHoursPerUnit" id="laborHoursPerUnit"
                        value="{{ $garment->laborHoursPerUnit ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Labor Hours Per Unit" required>
                </div>

                <div>
                    <label for="hourlyLaborRate" class="text-gray-700 dark:text-gray-200">Hourly Labor Rate</label>
                    <input type="number" step="0.01" name="hourlyLaborRate" id="hourlyLaborRate"
                        value="{{ $garment->hourlyLaborRate ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Hourly Labor Rate" required>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" onclick="closeModal('{{ $id }}')"
                    class="mr-2 transform rounded-md bg-gray-500 px-4 py-2.5 text-white hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit"
                    class="transform rounded-md bg-blue-600 px-4 py-2.5 text-white hover:bg-blue-500 focus:bg-blue-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
