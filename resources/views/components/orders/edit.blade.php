<div id="{{ $id }}" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
    <div class="w-96 rounded-md bg-white p-6 shadow-lg dark:bg-gray-800">
        <h2 class="text-lg font-semibold capitalize text-gray-700 dark:text-white">Edit Order</h2>
        @if (Session::has('fail'))
            <div class="mt-4 rounded bg-red-100 p-2 text-red-600 dark:bg-red-200">
                {{ Session::get('fail') }}
            </div>
        @endif
        <form action="{{ route('orders.edit', ['id' => $order->id ?? '']) }}" method="POST" class="mt-6">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="customer_id" class="text-gray-700 dark:text-gray-200">Customer</label>
                    <select name="customer_id" id="customer_id"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        required>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="garment_id" class="text-gray-700 dark:text-gray-200">Garment</label>
                    <select name="garment_id" id="garment_id"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        required>
                        @foreach ($garments as $garment)
                            <option value="{{ $garment->id }}"
                                {{ $order->garment_id == $garment->id ? 'selected' : '' }}>
                                {{ $garment->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="size" class="text-gray-700 dark:text-gray-200">Size</label>
                    <input type="text" name="size" id="size" value="{{ $order->size ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Size" required>
                </div>

                <div>
                    <label for="quantity" class="text-gray-700 dark:text-gray-200">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{ $order->quantity ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Quantity" required>
                </div>

                <div>
                    <label for="due_date" class="text-gray-700 dark:text-gray-200">Due Date</label>
                    <input type="date" name="due_date" id="due_date" value="{{ $order->due_date ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        required>
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
