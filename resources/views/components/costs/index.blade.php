@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Order Costs</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">View detailed costs for each order.</p>

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

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">ID
                                    </th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Order ID</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Material Cost</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Labor Cost</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Machine Cost</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Total Cost</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                @forelse ($costs as $cost)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">{{ $cost->id }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">{{ $cost->order_id }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                            {{ $cost->material_cost }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                            {{ $cost->labor_cost }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                            {{ $cost->machine_cost }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                            {{ $cost->total_cost }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"
                                            class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-300">No costs
                                            found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
