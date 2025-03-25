<div id="{{ $id }}" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
    <div class="w-96 rounded-md bg-white p-6 shadow-lg dark:bg-gray-800">
        <h2 class="text-lg font-semibold capitalize text-gray-700 dark:text-white">Edit Machine</h2>

        @if (Session::has('fail'))
            <div class="mt-4 rounded bg-red-100 p-2 text-red-600 dark:bg-red-200">
                {{ Session::get('fail') }}
            </div>
        @endif

        <form action="{{ route('machines.edit', ['id' => $machine->id ?? '']) }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="id" value="{{ $machine->id }}">

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="text-gray-700 dark:text-gray-200">Name</label>
                    <input type="text" name="name" id="name" value="{{ $machine->name ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Machine Name" required>
                </div>
                <div>
                    <label for="type" class="text-gray-700 dark:text-gray-200">Type</label>
                    <select name="type" id="type"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        <option value="High Speed" {{ $machine->type === 'High Speed' ? 'selected' : '' }}>High Speed
                        </option>
                        <option value="Normal" {{ $machine->type === 'Normal' ? 'selected' : '' }}>Normal</option>
                    </select>
                </div>
                <div>
                    <label for="hourlyRate" class="text-gray-700 dark:text-gray-200">Hourly Rate</label>
                    <input type="number" step="0.01" name="hourlyRate" id="hourlyRate"
                        value="{{ $machine->hourlyRate ?? '' }}"
                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter Hourly Rate" required>
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
