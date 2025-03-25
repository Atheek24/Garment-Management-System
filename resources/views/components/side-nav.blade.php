<aside
    class="flex h-screen w-64 flex-col overflow-y-auto border-r bg-white px-4 py-8 rtl:border-l rtl:border-r-0 dark:border-gray-700 dark:bg-gray-900">
    <a href="{{ route('index') }}">
        <img class="ml-12 h-5 w-auto sm:h-9" src="{{ asset('/build/assets/Bluetex Logo 1.svg') }}" alt="">
    </a>

    <div class="mt-6 flex flex-1 flex-col justify-between">
        <nav>
            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager', 'Inventory Manager', 'Garment Manager', 'Staff']))
                <a href="{{ route('index') }}"
                    class="{{ request()->routeIs('index') ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400' }} mt-5 flex items-center rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path stroke="currentColor" stroke-width="2"
                            d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5ZM14 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5ZM4 16a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3ZM14 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-6Z" />
                    </svg>
                    <span class="mx-4 font-medium">Dashboard</span>
                </a>
            @endif

            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager']))
                <a href="{{ route('users.index') }}"
                    class="{{ request()->routeIs('users.index') ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400' }} mt-5 flex items-center rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1251_98416)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C5.96243 0 3.5 2.46243 3.5 5.5C3.5 8.53757 5.96243 11 9 11C12.0376 11 14.5 8.53757 14.5 5.5C14.5 2.46243 12.0376 0 9 0ZM5.5 5.5C5.5 3.567 7.067 2 9 2C10.933 2 12.5 3.567 12.5 5.5C12.5 7.433 10.933 9 9 9C7.067 9 5.5 7.433 5.5 5.5Z"
                                fill="currentColor" />
                            <path
                                d="M15.5 0C14.9477 0 14.5 0.447715 14.5 1C14.5 1.55228 14.9477 2 15.5 2C17.433 2 19 3.567 19 5.5C19 7.433 17.433 9 15.5 9C14.9477 9 14.5 9.44771 14.5 10C14.5 10.5523 14.9477 11 15.5 11C18.5376 11 21 8.53757 21 5.5C21 2.46243 18.5376 0 15.5 0Z"
                                fill="currentColor" />
                            <path
                                d="M19.0837 14.0157C19.3048 13.5096 19.8943 13.2786 20.4004 13.4997C22.5174 14.4246 24 16.538 24 19V21C24 21.5523 23.5523 22 23 22C22.4477 22 22 21.5523 22 21V19C22 17.3613 21.0145 15.9505 19.5996 15.3324C19.0935 15.1113 18.8625 14.5217 19.0837 14.0157Z"
                                fill="currentColor" />
                            <path
                                d="M6 13C2.68629 13 0 15.6863 0 19V21C0 21.5523 0.447715 22 1 22C1.55228 22 2 21.5523 2 21V19C2 16.7909 3.79086 15 6 15H12C14.2091 15 16 16.7909 16 19V21C16 21.5523 16.4477 22 17 22C17.5523 22 18 21.5523 18 21V19C18 15.6863 15.3137 13 12 13H6Z"
                                fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1251_98416">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="mx-4 font-medium">Users</span>
                </a>
            @endif

            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager']))
                <a href="{{ route('customers.index') }}"
                    class="{{ request()->routeIs('customers.index') ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400' }} mt-5 flex items-center rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg class="h-6 w-6" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">

                        <defs>

                            <style>
                                .cls-1 {
                                    fill: none;
                                    stroke: currentColor;
                                    stroke-linecap: round;
                                    stroke-linejoin: round;
                                    stroke-width: 2px;
                                }
                            </style>

                        </defs>

                        <title />

                        <g data-name="79-users" id="_79-users">

                            <circle class="cls-1" cx="16" cy="13" r="5" />

                            <path class="cls-1" d="M23,28A7,7,0,0,0,9,28Z" />

                            <path class="cls-1" d="M24,14a5,5,0,1,0-4-8" />

                            <path class="cls-1" d="M25,24h6a7,7,0,0,0-7-7" />

                            <path class="cls-1" d="M12,6a5,5,0,1,0-4,8" />

                            <path class="cls-1" d="M8,17a7,7,0,0,0-7,7H7" />

                        </g>

                    </svg>
                    <span class="mx-4 font-medium">Customers</span>
                </a>
            @endif

            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager', 'Inventory Manager', 'Staff']))
                <a href="{{ route('materials.index') }}"
                    class="{{ request()->routeIs('materials.index') ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400' }} mt-5 flex items-center rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg fill="currentColor" class="h-6 w-6" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 436.979 436.979" xmlns:xlink="http://www.w3.org/1999/xlink"
                        enable-background="new 0 0 436.979 436.979">
                        <path
                            d="m369.299,85.997c5.523,0 10-4.477 10-10 0-10.2 8.298-18.499 18.499-18.499h7.262c5.523,0 10-4.477 10-10v-37.498c0-5.523-4.477-10-10-10h-316.485c-5.523,0-10,4.477-10,10v37.498c0,5.523 4.477,10 10,10h7.262c10.2,0 18.499,8.298 18.499,18.499 0,5.523 4.477,10 10,10h7.487v134.873c0,28.153-22.904,51.057-51.058,51.057-21.419,0-38.846-17.426-38.846-38.846 0-16.033 13.044-29.077 29.077-29.077 11.724,0 21.261,9.538 21.261,21.261 0,5.523 4.477,10 10,10s10-4.477 10-10c0-22.751-18.51-41.261-41.261-41.261-27.061,0-49.077,22.016-49.077,49.077 0,32.448 26.398,58.846 58.846,58.846 20.025,0 38.129-8.34 51.058-21.712v80.767h-7.487c-5.523,0-10,4.477-10,10 0,10.2-8.298,18.499-18.499,18.499h-7.262c-5.523,0-10,4.477-10,10v37.498c0,5.523 4.477,10 10,10h316.485c5.523,0 10-4.477 10-10v-37.498c0-5.523-4.477-10-10-10h-7.262c-10.2,0-18.499-8.298-18.499-18.499 0-5.523-4.477-10-10-10h-7.487v-264.985h7.487zm-187.681,264.985l160.194-73.232v23.783l-108.176,49.449h-52.018zm65.469-264.985l82.86,37.879-26.001,11.886-108.863-49.765h52.004zm32.806,60.76l-26.013,11.892-102.057-46.657v-23.78l128.07,58.545zm-76.073,34.776l-51.997-23.771v-23.779l78.005,35.661-26.008,11.889zm-51.997-1.78l27.945,12.776-27.945,12.775v-25.551zm0,47.541l189.989-86.852v23.779l-189.989,86.852v-23.779zm0,45.77l189.989-86.852v23.779l-189.989,86.852v-23.779zm0,45.769l189.989-86.852v23.779l-189.989,86.852v-23.779zm143.369-232.836h46.62v21.312l-46.62-21.312zm99.868-65.997v17.498h-296.485v-17.498h296.485zm-31.014,37.498c-1.463,2.659-2.625,5.506-3.43,8.499h-227.597c-0.806-2.992-1.967-5.84-3.43-8.499h234.457zm-265.471,359.481v-17.498h296.485v17.498h-296.485zm31.014-37.498c1.463-2.659 2.625-5.506 3.43-8.499h227.597c0.806,2.992 1.967,5.84 3.43,8.499h-234.457zm152.154-28.499l60.069-27.458v27.458h-60.069z" />
                    </svg>
                    <span class="mx-4 font-medium">Materials</span>
                </a>
            @endif

            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager', 'Garment Manager', 'Staff']))
                <a href="{{ route('machines.index') }}"
                    class="{{ request()->routeIs('machines.index') ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400' }} mt-5 flex items-center rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" class="h-6 w-6"
                        fill="currentColor">
                        <g id="Sewing_machine">
                            <path d="M55,5h-9c0-2.4-1.6-4-4-4h-2c-2.3,0-4,1.7-4,4H10c-4.2,0-8,3.8-8,8v9c0,4.2,3.8,8,8,8H9v5c0,1.4,1.1,2.6,2.4,2.6
  c1.4,0,2.6-1.1,2.6-2.6v-5h-1c4.2,0,8-3.8,8-8v-1h18v22H8.9C4.7,43,1,46.8,1,51v4c0,4.2,3.8,8,8,8h46c4.2,0,8-3.8,8-8V13
  C63,8.8,59.2,5,55,5z M40,3h2c1.3,0,2,0.7,2,2h-6C38,3.8,38.8,3,40,3z M12,35c0,0.3-0.3,0.6-0.6,0.6C11,35.6,11,35.1,11,35v-5h1V35
  z M61,55c0,3.1-2.9,6-6,6H9c-3.1,0-6-2.9-6-6v-4c0-3.1,2.8-6,5.9-6H39c1.1,0,2-0.9,2-2V21c0-1.1-0.9-2-2-2H21c-1.1,0-2,0.9-2,2v1
  c0,3.1-2.9,6-6,6h-3c-3.1,0-6-2.9-6-6v-9c0-3.1,2.9-6,6-6h45c3.1,0,6,2.9,6,6V55z" />
                            <path d="M51,28c-2.2,0-4,1.8-4,4c0,2.2,1.8,4,4,4c2.2,0,4-1.8,4-4C55,29.8,53.2,28,51,28z M51,34c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2
  c1.1,0,2,0.9,2,2C53,33.1,52.1,34,51,34z" />
                            <path d="M51,23c2.2,0,4-1.8,4-4c0-2.2-1.8-4-4-4c-2.2,0-4,1.8-4,4C47,21.2,48.8,23,51,23z M51,17c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2
  c-1.1,0-2-0.9-2-2C49,17.9,49.9,17,51,17z" />
                            <path d="M51,49H11c-0.6,0-1,0.4-1,1s0.4,1,1,1h40c0.6,0,1-0.4,1-1S51.6,49,51,49z" />
                            <path d="M56,49h-1c-0.6,0-1,0.4-1,1s0.4,1,1,1h1c0.6,0,1-0.4,1-1S56.6,49,56,49z" />
                        </g>
                    </svg>
                    <span class="mx-4 font-medium">Machines</span>
                </a>
            @endif

            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager', 'Garment Manager', 'Staff']))
                <a href="{{ route('garments.index') }}"
                    class="{{ request()->routeIs('garments.index') ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400' }} mt-5 flex items-center rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg fill="currentColor" class="h-6 w-6" viewBox="0 0 32 32" id="Outline"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.17,21.94a.75.75,0,0,1-.38-.1.76.76,0,0,1-.37-.65V17.73a.76.76,0,0,1,.41-.67L13,11.91V10.45a.73.73,0,0,1,.45-.68l2.27-1a.7.7,0,0,1,.6,0l2.27,1a.73.73,0,0,1,.45.68v1.46l10.15,5.15a.76.76,0,0,1,.41.67v3.46a.75.75,0,0,1-1.11.66L16,15,3.53,21.85A.77.77,0,0,1,3.17,21.94ZM16,13.36a.68.68,0,0,1,.36.1l11.72,6.46V18.19L17.93,13a.76.76,0,0,1-.41-.67V10.94L16,10.28l-1.52.66v1.43a.76.76,0,0,1-.41.67L3.92,18.19v1.73l11.72-6.46A.68.68,0,0,1,16,13.36Z" />
                        <path d="M26.35,20.57H5.65a.75.75,0,1,1,0-1.5h20.7a.75.75,0,0,1,0,1.5Z" />
                        <path
                            d="M16.08,9.88a.76.76,0,0,1-.75-.64,6.91,6.91,0,0,1,0-2.27,2.94,2.94,0,0,1,.45-.83c.14-.2.44-.64.41-.78a.52.52,0,0,0-.21-.2c-.75-.46-1.14-.22-1.93.74a3.88,3.88,0,0,1-.45.5,1.18,1.18,0,0,1-1.05.33,1.85,1.85,0,0,1-1.17-1.08A.75.75,0,0,1,12.77,5l0,.07L12.92,5c.57-.69,1.9-2.3,3.88-1.06a1.85,1.85,0,0,1,.89,1.16A2.57,2.57,0,0,1,17,7c-.08.13-.22.33-.25.4a5.71,5.71,0,0,0,0,1.64.75.75,0,0,1-.64.85Z" />
                        <path
                            d="M22.32,28.57H9.68a.75.75,0,0,1-.75-.75v-8a.76.76,0,0,1,.75-.75H22.32a.76.76,0,0,1,.75.75v8A.75.75,0,0,1,22.32,28.57Zm-11.89-1.5H21.57v-6.5H10.43Z" />
                        <path
                            d="M22.32,25.74H9.68A.76.76,0,0,1,8.93,25V19.82a.76.76,0,0,1,.75-.75H22.32a.76.76,0,0,1,.75.75V25A.76.76,0,0,1,22.32,25.74Zm-11.89-1.5H21.57V20.57H10.43Z" />
                    </svg>
                    <span class="mx-4 font-medium">Garments</span>
                </a>
            @endif

            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager', 'Inventory Manager', 'Garment Manager', 'Staff']))
                <a href="{{ route('orders.index') }}"
                    class="{{ request()->routeIs('orders.index') ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400' }} mt-5 flex items-center rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg class="h-6 w-6" viewBox="0 0 1024 1024" fill="currentColor" class="icon" version="1.1"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M300 462.4h424.8v48H300v-48zM300 673.6H560v48H300v-48z" fill="" />
                        <path
                            d="M818.4 981.6H205.6c-12.8 0-24.8-2.4-36.8-7.2-11.2-4.8-21.6-11.2-29.6-20-8.8-8.8-15.2-18.4-20-29.6-4.8-12-7.2-24-7.2-36.8V250.4c0-12.8 2.4-24.8 7.2-36.8 4.8-11.2 11.2-21.6 20-29.6 8.8-8.8 18.4-15.2 29.6-20 12-4.8 24-7.2 36.8-7.2h92.8v47.2H205.6c-25.6 0-47.2 20.8-47.2 47.2v637.6c0 25.6 20.8 47.2 47.2 47.2h612c25.6 0 47.2-20.8 47.2-47.2V250.4c0-25.6-20.8-47.2-47.2-47.2H725.6v-47.2h92.8c12.8 0 24.8 2.4 36.8 7.2 11.2 4.8 21.6 11.2 29.6 20 8.8 8.8 15.2 18.4 20 29.6 4.8 12 7.2 24 7.2 36.8v637.6c0 12.8-2.4 24.8-7.2 36.8-4.8 11.2-11.2 21.6-20 29.6-8.8 8.8-18.4 15.2-29.6 20-12 5.6-24 8-36.8 8z"
                            fill="" />
                        <path
                            d="M747.2 297.6H276.8V144c0-32.8 26.4-59.2 59.2-59.2h60.8c21.6-43.2 66.4-71.2 116-71.2 49.6 0 94.4 28 116 71.2h60.8c32.8 0 59.2 26.4 59.2 59.2l-1.6 153.6z m-423.2-47.2h376.8V144c0-6.4-5.6-12-12-12H595.2l-5.6-16c-11.2-32.8-42.4-55.2-77.6-55.2-35.2 0-66.4 22.4-77.6 55.2l-5.6 16H335.2c-6.4 0-12 5.6-12 12v106.4z"
                            fill="" />
                    </svg>
                    <span class="mx-4 font-medium">Orders</span>
                </a>
            @endif

            @if (in_array(Auth::user()->role, ['Super Admin', 'Manager']))
                <a href="{{ route('costs.index') }}"
                    class="{{ request()->routeIs('costs.index') ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200' : 'text-gray-600 dark:text-gray-400' }} mt-5 flex items-center rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 5.25C12.4142 5.25 12.75 5.58579 12.75 6V6.31673C14.3804 6.60867 15.75 7.83361 15.75 9.5C15.75 9.91421 15.4142 10.25 15 10.25C14.5858 10.25 14.25 9.91421 14.25 9.5C14.25 8.65573 13.3765 7.75 12 7.75C10.6235 7.75 9.75 8.65573 9.75 9.5C9.75 10.3443 10.6235 11.25 12 11.25C13.9372 11.25 15.75 12.5828 15.75 14.5C15.75 16.1664 14.3804 17.3913 12.75 17.6833V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.6833C9.61957 17.3913 8.25 16.1664 8.25 14.5C8.25 14.0858 8.58579 13.75 9 13.75C9.41421 13.75 9.75 14.0858 9.75 14.5C9.75 15.3443 10.6235 16.25 12 16.25C13.3765 16.25 14.25 15.3443 14.25 14.5C14.25 13.6557 13.3765 12.75 12 12.75C10.0628 12.75 8.25 11.4172 8.25 9.5C8.25 7.83361 9.61957 6.60867 11.25 6.31673V6C11.25 5.58579 11.5858 5.25 12 5.25Z"
                            fill="currentColor" />
                    </svg>
                    <span class="mx-4 font-medium">Costs</span>
                </a>
            @endif

        </nav>

        <div class="mt-6 flex items-center justify-between">
            <button onclick="openModal('profileModal')" class="flex items-center gap-x-2">
                <img class="h-7 w-7 rounded-full object-cover"
                    src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&h=634&q=80"
                    alt="avatar" />
                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">
                    {{ Auth::user()->name ?? 'Guest' }}
                </span>
            </button>
            <div id="profileModal"
                class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
                <div class="w-96 rounded-md bg-white p-6 shadow-lg dark:bg-gray-800">
                    <h2 class="text-lg font-semibold capitalize text-gray-700 dark:text-white">User Profile</h2>

                    <form method="POST" action="{{ route('profile.update') }}" class="mt-6">
                        @csrf
                        <!-- Name -->
                        <div>
                            <label for="name" class="text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"
                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <label for="email" class="text-gray-700 dark:text-gray-200">Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300" />
                        </div>

                        <!-- Save Button -->
                        <div class="mt-6 flex justify-end">
                            <button type="button" onclick="closeModal('profileModal')"
                                class="mr-2 transform rounded-md bg-gray-500 px-4 py-2 text-white hover:bg-gray-400">
                                Cancel
                            </button>
                            <button type="submit"
                                class="transform rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-500 focus:bg-blue-500">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>



            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit"
                    class="rotate-180 text-gray-500 transition-colors duration-200 hover:text-blue-500 rtl:rotate-0 dark:text-gray-400 dark:hover:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>
