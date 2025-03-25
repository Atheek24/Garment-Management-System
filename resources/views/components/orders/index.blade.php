@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Orders</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Manage your orders effectively.</p>

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
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Order List</h3>
                            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager']))
                                <button onclick="openModal('addOrderModal')"
                                    class="btn btn-success rounded bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-500">
                                    Add Order
                                </button>
                            @endif
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">ID
                                    </th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Customer Name</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Garment Name</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Size</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Quantity</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Order Date</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Due
                                        Date</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Created By</th>
                                    @if (in_array(Auth::user()->role, ['Super Admin', 'Manager']))
                                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                            colspan="2">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                @if (count($all_orders) > 0)
                                    @foreach ($all_orders as $order)
                                        <tr>
                                            <td class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-200">
                                                {{ $order->id }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $order->customer->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $order->garment->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <a href="{{ route('orders.updateStatus', ['id' => $order->id]) }}"
                                                    class="btn btn-sm {{ $order->status === 'Pending' ? 'bg-yellow-500 text-white' : '' }} {{ $order->status === 'In Progress' ? 'bg-blue-500 text-white' : '' }} {{ $order->status === 'Completed' ? 'bg-green-500 text-white' : '' }} {{ $order->status === 'Cancelled' ? 'bg-red-500 text-white' : '' }} px-3 py-1">
                                                    {{ $order->status }}
                                                </a>
                                            </td>

                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $order->size }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $order->quantity }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $order->order_date }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $order->due_date }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                                {{ $order->created_by }}
                                            </td>
                                            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager']))
                                                <td class="px-4 py-3 text-sm">
                                                    <button onclick="openModal('editOrderModal-{{ $order->id }}')"
                                                        class="text-blue-500 hover:underline">
                                                        Edit
                                                    </button>
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    <a href="/order/delete/{{ $order->id }}"
                                                        class="text-red-500 hover:underline"
                                                        onclick="return confirm('Are you sure you want to delete this order?');">
                                                        Delete
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>

                                        <x-orders.edit id="editOrderModal-{{ $order->id }}" :order="$order"
                                            :customers="$customers" :garments="$garments" />
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9"
                                            class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-300">No
                                            Orders Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-orders.add id="addOrderModal" :customers="$customers" :garments="$garments" />

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
@endsection
