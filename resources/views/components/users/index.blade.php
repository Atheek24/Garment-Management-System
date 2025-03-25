@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Users</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Manage your users effectively.</p>

        @if (Auth::user()->role === 'Super Admin')
            <div class="mt-4 flex justify-end">
                <a href="{{ route('register') }}"
                    class="btn btn-primary rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500">
                    Add User
                </a>
            </div>
        @endif

        <div class="mt-6 flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 md:rounded-lg dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        ID
                                    </th>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Name</th>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Email</th>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Role</th>
                                    @if (Auth::user()->role === 'Super Admin')
                                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                            colspan="2">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-200">
                                            {{ $user->id }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200">
                                            {{ ucfirst($user->role ?? 'User') }}</td>
                                        @if (Auth::user()->role === 'Super Admin')
                                            <td class="px-4 py-3 text-sm">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this user?');"
                                                        class="text-red-500 hover:underline">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
@endsection
