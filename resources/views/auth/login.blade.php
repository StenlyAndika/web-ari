@extends('layouts.admin')

@section('containerlogin')
    @if (session('toast_success'))
        <div id="alertDialog" class="flex w-full max-w-xs bg-white rounded-lg shadow-md fixed bottom-5 right-5" role="alert">
            <div class="inline-flex items-center justify-center w-12 bg-emerald-500 rounded-l-lg">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500">Success</span>
                    <p class="text-sm text-gray-600">{{ session('toast_success') }}</p>
                </div>
            </div>
        </div>
    @endif
    @if (session('toast_error'))
        <div id="alertDialog" class="flex w-full max-w-xs bg-white rounded-lg shadow-md fixed bottom-5 right-5" role="alert">
            <div class="inline-flex items-center justify-center w-12 bg-red-500 rounded-l-lg">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-500">Error</span>
                    <p class="text-sm text-gray-600">{{ session('toast_error') }}</p>
                </div>
            </div>
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
                                    <i class="material-icons text-gray-400 group-focus-within:text-primary">person</i>
                                </div>
                                <input type="text"
                                    name="username"
                                    id="username"
                                    autocomplete="username"
                                    required
                                    class="input-focus block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none transition-all duration-200 bg-gray-50"
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
                                    <i class="material-icons text-gray-400 group-focus-within:text-primary">lock</i>
                                </div>
                                <input type="password"
                                    name="password"
                                    id="password"
                                    autocomplete="current-password"
                                    required
                                    class="input-focus block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none transition-all duration-200 bg-gray-50"
                                    placeholder="Enter your password" />
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <div class="pt-2">
                            <button type="submit"
                                    class="btn-hover btn-active w-full py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-primary to-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg">
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
                                        class="btn-hover btn-active w-full py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-emerald-500 to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200 shadow-lg">
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
@endsection
