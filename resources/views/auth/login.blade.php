@extends('layouts.admin')

@section('containerlogin')
    @if (session('toast_success'))
        <div id="alertDialog"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-emerald-800 bg-emerald-50 rounded-xl shadow-lg border border-emerald-200 fixed bottom-5 right-5 z-50"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-emerald-600 bg-emerald-100 rounded-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Success icon</span>
            </div>
            <div class="ms-3 text-sm font-semibold">{{ session('toast_success') }}</div>
        </div>
    @endif
    @if (session('toast_error'))
        <div id="alertDialog"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-red-800 bg-red-50 rounded-xl shadow-lg border border-red-200 fixed bottom-5 right-5 z-50"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-600 bg-red-100 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-semibold">{{ session('toast_error') }}</div>
        </div>
    @endif

    <div class="min-h-screen bg-gradient-to-br from-primary to-secondary">
        <div class="flex min-h-screen items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">

                <!-- Header Section -->
                <div class="text-center">
                    <div class="mx-auto h-20 w-20 bg-white rounded-full shadow-lg flex items-center justify-center mb-6 ring-8 ring-indigo-50">
                        <img class="h-10 w-10 object-contain" src="img/tablogo.png" alt="Minimarket Iwel Logo" />
                    </div>
                    <h1 class="text-3xl font-bold text-white tracking-tight">
                        Minimarket Iwel
                    </h1>
                    <p class="mt-2 text-sm text-white">
                        Welcome back! Please sign in to continue
                    </p>
                </div>

                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <form class="space-y-6" action="{{ route('auth') }}" method="post">
                        @csrf

                        <!-- Username Field -->
                        <div class="space-y-2">
                            <label for="username" class="block text-sm font-medium text-gray-700">
                                Username
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input type="text"
                                       name="username"
                                       id="username"
                                       autocomplete="username"
                                       required
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white"
                                       placeholder="Enter your username" />
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       autocomplete="current-password"
                                       required
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white"
                                       placeholder="Enter your password" />
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <div class="pt-2">
                            <button type="submit"
                                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                </span>
                                Sign in to your account
                            </button>
                        </div>
                    </form>

                    <!-- Generate Admin Button -->
                    @can('checkadmin')
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <form action="{{ route('generateadmin') }}" method="post">
                                @csrf
                                @method('post')
                                <button type="submit"
                                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl">
                                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-emerald-500 group-hover:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </span>
                                    Generate Admin Account
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>

                <!-- Footer -->
                <div class="text-center">
                    <p class="text-xs text-white">
                        Secure login powered by Minimarket Iwel
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide toast notifications
        setTimeout(() => {
            const alert = document.getElementById('alertDialog');
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            }
        }, 5000);
    </script>
@endsection
