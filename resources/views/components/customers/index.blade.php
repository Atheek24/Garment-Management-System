@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Customers</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Manage your customers effectively.</p>

        @if (Session::has('success'))
            <span class="mt-2 block rounded bg-green-100 p-2 text-green-600">{{ Session::get('success') }}</span>
        @endif
        @if (Session::has('fail'))
            <span class="mt-2 block rounded bg-red-100 p-2 text-red-600">{{ Session::get('fail') }}</span>
        @endif

        <div class="mt-6 flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 md:rounded-lg dark:border-gray-700">

                        <div
                            class="flex items-center justify-between border-b bg-gray-50 px-4 py-3 dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Customer List</h3>
                            <button onclick="openModal('addCustomerModal')"
                                class="btn btn-success rounded bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-500">
                                Add Customer
                            </button>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">ID
                                    </th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Name</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Email</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Phone</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Address</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                        colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                @if (count($all_customers) > 0)
                                    @foreach ($all_customers as $customer)
                                        <tr>
                                            <td class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-200">
                                                {{ $loop->iteration }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $customer->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $customer->email }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $customer->phone }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $customer->address }}</td>
                                            <td class="px-4 py-3 text-sm">
                                                <a href="/customer/edit/status/{{ $customer->id }}"
                                                    class="btn btn-sm {{ $customer->status ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} px-3 py-1">
                                                    {{ $customer->status ? 'Enable' : 'Disable' }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <button onclick="openModal('editCustomerModal-{{ $customer->id }}')"
                                                    class="text-blue-500 hover:underline">
                                                    Edit
                                                </button>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <a href="/customer/delete/{{ $customer->id }}"
                                                    class="text-red-500 hover:underline"
                                                    onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
                                            </td>
                                        </tr>

                                        <x-customers.edit id="editCustomerModal-{{ $customer->id }}"
                                            :customer="$customer" />
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8"
                                            class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-300">No
                                            Customers Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-customers.add id="addCustomerModal" />

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
@endsection
