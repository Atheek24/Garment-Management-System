@extends('layouts.app')

@section('content')
    <div class="flex-1 bg-gray-50 p-6 dark:bg-gray-900">
        <div class="container mx-auto grid px-6">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Dashboard
            </h2>


            <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">

                <div class="flex items-center rounded-lg bg-gray-800 p-4 shadow-md">
                    <div class="mr-4 rounded-full bg-orange-100 p-3 text-orange-500 dark:bg-orange-500 dark:text-orange-100">
                        <svg fill="currentColor" class="h-6 w-6" viewBox="0 -64 640 640"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">Total Customers</p>
                        <p class="text-lg font-semibold text-gray-200">{{ $total_customers }}</p>
                    </div>
                </div>

                <div class="flex items-center rounded-lg bg-gray-800 p-4 shadow-md">
                    <div
                        class="mr-4 rounded-full bg-green-100 p-3 text-orange-500 dark:bg-green-500 dark:text-green-100">
                        <svg fill="currentColor" class="h-6 w-6" viewBox="0 -64 640 640"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">Active Customers</p>
                        <p class="text-lg font-semibold text-gray-200">{{ $active_customers }}</p>
                    </div>
                </div>

                <div class="flex items-center rounded-lg bg-gray-800 p-4 shadow-md">
                    <div class="mr-4 rounded-full bg-blue-100 p-3 text-blue-500 dark:bg-blue-500 dark:text-blue-100">
                        <svg fill="currentColor" class="h-6 w-6" viewBox="0 0 50 50"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M28 3L28 4L26 4L26 11L32 11L32 4L30 4L30 3 Z M 34 8L34 12L15 12L15 10L13 10L13 23L11 23L11 12L10 12C7.195313 12 5 14.195313 5 17C5 19.351563 5.960938 26.808594 6 27.125L6.125 28L10 28L10 29L9 29L9 31L13 31L13 29L12 29L12 28L15.78125 28L16.59375 24.75C16.703125 24.304688 17.101563 24 17.5625 24L22.84375 24C23.820313 24 24.652344 24.664063 24.8125 25.59375C24.941406 26.324219 25 27.140625 25 28C25 28.859375 24.941406 29.675781 24.8125 30.40625C24.652344 31.335938 23.820313 32 22.84375 32L8 32C5.242188 32 3 34.242188 3 37L3 42C3 43.652344 4.347656 45 6 45L8 45L8 46L13 46L13 45L33 45L33 46L38 46L38 45L40 45C41.652344 45 43 43.652344 43 42L43 17C43 14.242188 40.757813 12 38 12L36 12L36 8 Z M 44.71875 15C44.910156 15.632813 45 16.304688 45 17L45 24L47 24L47 15 Z M 34 17C35.652344 17 37 18.347656 37 20C37 21.652344 35.652344 23 34 23C32.347656 23 31 21.652344 31 20C31 18.347656 32.347656 17 34 17 Z M 34 19C33.449219 19 33 19.449219 33 20C33 20.550781 33.449219 21 34 21C34.550781 21 35 20.550781 35 20C35 19.449219 34.550781 19 34 19 Z M 34 27C36.757813 27 39 29.242188 39 32C39 34.757813 36.757813 37 34 37C31.242188 37 29 34.757813 29 32C29 29.242188 31.242188 27 34 27 Z M 34 29C32.34375 29 31 30.34375 31 32C31 33.65625 32.34375 35 34 35C35.65625 35 37 33.65625 37 32C37 30.34375 35.65625 29 34 29Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">Total Machines</p>
                        <p class="text-lg font-semibold text-gray-200">{{ $total_machines }}</p>
                    </div>
                </div>

                <div class="flex items-center rounded-lg bg-gray-800 p-4 shadow-md">
                    <div class="mr-4 rounded-full bg-green-100 p-3 text-green-500 dark:bg-green-500 dark:text-green-100">
                        <svg fill="currentColor" class="h-6 w-6" viewBox="0 0 50 50"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M28 3L28 4L26 4L26 11L32 11L32 4L30 4L30 3 Z M 34 8L34 12L15 12L15 10L13 10L13 23L11 23L11 12L10 12C7.195313 12 5 14.195313 5 17C5 19.351563 5.960938 26.808594 6 27.125L6.125 28L10 28L10 29L9 29L9 31L13 31L13 29L12 29L12 28L15.78125 28L16.59375 24.75C16.703125 24.304688 17.101563 24 17.5625 24L22.84375 24C23.820313 24 24.652344 24.664063 24.8125 25.59375C24.941406 26.324219 25 27.140625 25 28C25 28.859375 24.941406 29.675781 24.8125 30.40625C24.652344 31.335938 23.820313 32 22.84375 32L8 32C5.242188 32 3 34.242188 3 37L3 42C3 43.652344 4.347656 45 6 45L8 45L8 46L13 46L13 45L33 45L33 46L38 46L38 45L40 45C41.652344 45 43 43.652344 43 42L43 17C43 14.242188 40.757813 12 38 12L36 12L36 8 Z M 44.71875 15C44.910156 15.632813 45 16.304688 45 17L45 24L47 24L47 15 Z M 34 17C35.652344 17 37 18.347656 37 20C37 21.652344 35.652344 23 34 23C32.347656 23 31 21.652344 31 20C31 18.347656 32.347656 17 34 17 Z M 34 19C33.449219 19 33 19.449219 33 20C33 20.550781 33.449219 21 34 21C34.550781 21 35 20.550781 35 20C35 19.449219 34.550781 19 34 19 Z M 34 27C36.757813 27 39 29.242188 39 32C39 34.757813 36.757813 37 34 37C31.242188 37 29 34.757813 29 32C29 29.242188 31.242188 27 34 27 Z M 34 29C32.34375 29 31 30.34375 31 32C31 33.65625 32.34375 35 34 35C35.65625 35 37 33.65625 37 32C37 30.34375 35.65625 29 34 29Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">Inactive Machines</p>
                        <p class="text-lg font-semibold text-gray-200">{{ $inactive_machines }}</p>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">

                <div class="rounded-lg bg-gray-800 p-6 shadow-md">
                    <h3 class="mb-4 text-lg font-semibold text-gray-200">Garment Categories Distribution</h3>
                    <div class="chart-container" style="width: 290px; height: 290px; margin: auto;">
                        <canvas id="donutChart"></canvas>
                    </div>
                </div>

                <div class="rounded-lg bg-gray-800 p-6 shadow-md">
                    <h3 class="mb-4 text-lg font-semibold text-gray-200">Traffic</h3>
                    <div class="chart-container" style="width: 400px; height: 300px; margin: auto;">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const garmentCategories = @json($garmentCategories);
            const labels = Object.keys(garmentCategories);
            const data = Object.values(garmentCategories);

            const donutCtx = document.getElementById('donutChart').getContext('2d');
            new Chart(donutCtx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: ['#36A2EB', '#4CAF50', '#9C27B0',
                            '#FFC107'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '80%',
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    }
                }
            });


            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: @json($months),
                    datasets: [{
                            label: 'Completed',
                            data: @json($completedData),
                            borderColor: '#4CAF50',
                            backgroundColor: 'rgba(76, 175, 80, 0.1)',
                            tension: 0.4,
                            pointBackgroundColor: '#4CAF50',
                            pointBorderWidth: 2
                        },
                        {
                            label: 'Cancelled',
                            data: @json($cancelledData),
                            borderColor: '#F44336',
                            backgroundColor: 'rgba(244, 67, 54, 0.1)',
                            tension: 0.4,
                            pointBackgroundColor: '#F44336',
                            pointBorderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#cccccc'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        y: {
                            ticks: {
                                color: '#cccccc'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
