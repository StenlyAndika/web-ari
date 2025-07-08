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

    <div class="min-h-screen bg-[#0B1D51]">
        <div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
            <!-- Logo and Header Section -->
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <div class="text-center mb-8">
                    <div class="relative inline-block">
                        <div class="bg-white p-4 rounded-2xl shadow-lg mb-6">
                            <img class="mx-auto h-12 w-auto"
                                 src="img/tablogo.png"
                                 alt="Minimarket Iwel Logo" />
                        </div>
                    </div>
                    <h1 class="mt-4 text-4xl font-bold text-white tracking-tight">
                        Minimarket Iwel
                    </h1>
                    <p class="mt-3 text-lg text-white font-medium">
                        Welcome back! Please sign in to continue
                    </p>
                </div>
            </div>

            <!-- Login Form -->
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8">
                    <form class="space-y-6" action="{{ route('auth') }}" method="post">
                        @csrf

                        <!-- Username Field -->
                        <div>
                            <label for="username" class="block text-sm font-semibold text-slate-700 mb-2">
                                Username
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input type="text"
                                       name="username"
                                       id="username"
                                       autocomplete="username"
                                       required
                                       class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200"
                                       placeholder="Enter your username" />
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       autocomplete="current-password"
                                       required
                                       class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200"
                                       placeholder="Enter your password" />
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <div class="pt-4">
                            <button type="submit"
                                    class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-xl shadow-lg transition-all duration-200 transform hover:scale-[1.02]">
                                <span class="flex items-center">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    Sign in to your account
                                </span>
                            </button>
                        </div>
                    </form>

                    <!-- Generate Admin Button -->
                    @can('checkadmin')
                        <div class="mt-6 pt-6 border-t border-slate-200">
                            <form action="{{ route('generateadmin') }}" method="post">
                                @csrf
                                @method('post')
                                <button type="submit"
                                        class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 rounded-xl shadow-lg transition-all duration-200 transform hover:scale-[1.02]">
                                    <span class="flex items-center">
                                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Generate Admin Account
                                    </span>
                                </button>
                            </form>
                        </div>
                    @endcan
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
